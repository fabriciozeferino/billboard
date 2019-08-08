<?php

namespace Tests\Feature;

use App\Project;
use App\Task;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TriggerLogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::create();

        $this->assertCount(1, $project->logs);
        $this->assertEquals('created', $project->logs->first()->description);

        tap($project->logs->last(), function ($logs) {
            $this->assertEquals('created', $logs->description);
            $this->assertInstanceOf(Project::class, $logs->subject);
        });
    }

    /** @test */
    public function creating_a_task()
    {
        $project = ProjectFactory::withTasks(1)->create();

        tap($project->tasks->first()->logs->last(), function ($logs) {
            $this->assertEquals('created', $logs->description);
            $this->assertInstanceOf(Task::class, $logs->subject);
        });
    }

    /** @test */
    public function updating_a_task()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), [
                'body' => 'foobar',
                'completed' => true,
            ]);

        tap($project->tasks->first()->logs->last(), function ($logs) {
            $this->assertEquals('updated', $logs->description);
            $this->assertInstanceOf(Task::class, $logs->subject);
            $this->assertEquals('foobar', $logs->subject->body);
        });

    }

    /** @test */
    public function updating_a_project()
    {
        $project = ProjectFactory::create();

        $edited_project = factory(Project::class)
            ->raw([
                'owner_id' => $project->owner_id
            ]);

        $this->actingAs($project->owner)
            ->patch($project->path(), $edited_project);

        tap($project->logs->last(), function ($logs) {
            $this->assertEquals('updated', $logs->description);
            $this->assertInstanceOf(Project::class, $logs->subject);
        });
    }


}
