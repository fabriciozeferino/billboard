<?php

namespace Tests\Setup;

use App\Project;
use App\Task;
use App\User;

class ProjectFactory
{
    private $tasksCount = 0;
    private $user;

    public function withTasks($count)
    {
        $this->tasksCount = $count;

        return $this;
    }

    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }

    public function create()
    {
        $project = factory(Project::class)->create([
            'owner_id' => $this->user ? $this->user->id : factory(User::class)->create()->id
        ]);

        factory(Task::class, $this->tasksCount)->create([
            'project_id' => $project->id,
            'owner_id' => $this->user ? $this->user->id : factory(User::class)->create()->id
        ]);

        return $project;
    }
}
