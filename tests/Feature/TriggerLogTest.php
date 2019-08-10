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

            $this->assertNull($activities->changes);
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
    public function updating_a_project()
    {
        $project = ProjectFactory::create();

        $remove = ['id', 'owner_id', 'updated_at', 'created_at'];

        // Unset $remove
        $old = array_diff_key($project->getOriginal(), array_flip($remove));

        $new_request = factory(Project::class)->raw(['owner_id' => $project->owner_id]);

        $this->actingAs($project->owner)->put($project->path(), $new_request);

        // Get arrayUnset $remove
        $new = array_diff_key($project->refresh()->getOriginal(), array_flip($remove));

        tap($project->activities->last(), function ($activities) use ($old, $new) {

            $this->assertEquals('updated', $activities->description);
            $this->assertInstanceOf(Project::class, $activities->subject);

            $expected = [
                'before' => $old,
                'after' => $new,
            ];

            $this->assertEquals($expected, $activities->changes);
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

    /**
     * @param $array
     * @param $unset
     * @return array
     */
    private function unsetUnnecessary($array, $unset)
    {
        foreach($unset as $key) {
            unset($array[$key]);
        }

        return $array;
    }
}
