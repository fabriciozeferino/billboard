<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait RecordsActivity
{
    /**
     * The project's old attributes.
     *
     * @var array
     */
    public $oldAttributes = [];


    /**
     * * Handle the task "updating" event.
     *
     *
     */
    public static function bootRecordsActivity()
    {
        foreach (self::recordableEvents() as $event) {

            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });

            if ($event === 'updated') {
                static::updating(function ($model) {
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }

    /**
     * Fetch the model events that should trigger activity.
     *
     * @return array
     */
    protected static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

        return ['created', 'updated'];
    }


    /**
     * @param $description
     */
    public function recordActivity($description)
    {
        // this has relationship project?? No, than it's a project ($this->project ?? $this)
        $this->activities()->create([
            'user_id' => ($this->project ?? $this)->owner->id,
            'project_id' => ($this->project ?? $this)->id,
            'description' => $description,
            'changes' => $this->activityChanges()
        ]);
    }

    /**
     * The log feed for the project.
     *
     * @return MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * Creates Before|After array
     *
     * @return array|null
     */
    public function activityChanges()
    {
        /*if (!empty($this->oldAttributes)) {
            dd([
                'before' => array_diff($this->oldAttributes, $this->getAttributes()),
                'after' => array_diff_key($this->getChanges(), array_flip(['id', 'owner_id', 'project_id', 'updated_at',]))
            ]);
        }*/

        if (!empty($this->oldAttributes)) {
            return [
                'before' => array_diff_key(array_diff($this->oldAttributes, $this->getAttributes()), array_flip(['id', 'owner_id', 'project_id', 'updated_at',])),
                'after' => array_diff_key($this->getChanges(), array_flip(['id', 'owner_id', 'project_id', 'updated_at',]))
            ];
        }

        return null;
    }
}
