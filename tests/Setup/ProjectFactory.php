<?php


namespace Tests\Setup;


use App\Project;

class ProjectFactory
{
    private $tasksCount;

    public function withTasks($count)
    {
        $this->tasksCount = $count;
    }

    public function create()
    {
        factory(Project::class)->create();

    }
}
