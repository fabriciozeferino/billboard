<?php


namespace App\Services;


class ActivityService
{
    /**
     * @param $project
     * @return array
     */
    public function render($project)
    {
        $activities = [];

        foreach ($project->activity as $activity) {

            $data = [];

            $data['id'] = $activity->id;

            $data['user_id'] = $activity->user->id;

            $data['user_name'] = $activity->user->name;

            $data['message'] = $this->messageFactory($activity);

            $data['description'] = $activity->description;

            if ($data['description'] == 'updated') {
                $data['changes'] = $activity->changes;
            }

            array_push($activities, $data);
        }

        return ['data' => $activities];
    }

    private function messageFactory($activity)
    {
        switch ($activity->description) {

            case 'created':
                return $message['message'] = $this->createdMessage($activity);
                break;

            case 'updated':
                return $message['message'] = $this->updatedMessage($activity);
                break;
        }

        // dump($activity);
    }


    private function createdMessage($activity)
    {
        $entity = (new $activity->subject_type)->find($activity->subject_id);

        $class = (string)class_basename($entity);

        $named = ($class == 'Project') ? $entity->title : $entity->body;

        $created_at = $entity->created_at->diffForHumans();

        $message = 'A new ' . $class . ' named "' . $named . '" was created ' . $created_at;

        return $message;
    }

    private function updatedMessage($activity)
    {
        //dd($activity);

        $entity = (new $activity->subject_type)->find($activity->subject_id);

        $class = (string)class_basename($entity);

        $updated_at = $entity->updated_at->diffForHumans();

        $body = [];
        foreach ($activity->changes as $changes) {

            foreach ($changes as $key => $change) {

                if (isset($body[$key])) {

                    array_push($body[$key], $change);
                } else {

                    $body[$key] = [$change];
                }
            }
        }

        $message = '';

       // dd($body);
        foreach ($body as $key => $item) {

            if (isset($item[1])) {
                $message .= "The {$key} was updated from \"{$item[0]}\" to \"{$item[1]}\" {$updated_at}. ";
            } else {
                $message .= "The {$key} was updated from \"{$item[0]}\"  {$updated_at}. ";
            }
        };

        return $message;
    }
}
