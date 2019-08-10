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

        $this->assertCount(1, $project->activities);
        $this->assertEquals('created', $project->activities->first()->description);

        tap($project->activities->last(), function ($activities) {
            $this->assertEquals('created', $activities->description);
            $this->assertInstanceOf(Project::class, $activities->subject);
        });
    }

    /** @test */
    public function creating_a_task()
    {
        $project = ProjectFactory::withTasks(1)->create();

        tap($project->tasks->first()->activities->last(), function ($activities) {
            $this->assertEquals('created', $activities->description);
            $this->assertInstanceOf(Task::class, $activities->subject);
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

        tap($project->tasks->first()->activities->last(), function ($activities) {
            $this->assertEquals('updated', $activities->description);
            $this->assertInstanceOf(Task::class, $activities->subject);
            $this->assertEquals('foobar', $activities->subject->body);
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

        tap($project->activities->last(), function ($activities) {
            $this->assertEquals('updated', $activities->description);
            $this->assertInstanceOf(Project::class, $activities->subject);
        });
    }


}
