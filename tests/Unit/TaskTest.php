<?php

namespace Tests\Unit;

use App\Project;
use App\Task;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_project()
    {
        $project = ProjectFactory::withTasks(1)->create();
        $task = $project->tasks->first();

        $this->assertInstanceOf(Project::class, $task->project);
    }


    /** @test */
    public function it_has_a_path()
    {
        $project = ProjectFactory::withTasks(1)->create();
        $task = $project->tasks->first();

        $this->assertEquals(SELF::URI . '/projects/' . $project->id . '/tasks/' . $task->id, $task->path());
    }

    /** @test */
    public function it_can_be_completed()
    {
        $project = ProjectFactory::withTasks(1)->create();
        $task = $project->tasks->first();

        $this->assertFalse($task->completed);

        $task->complete();

        $this->assertTrue($task->fresh()->completed);
    }


}
