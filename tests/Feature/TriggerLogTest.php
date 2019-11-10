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
        $project = ProjectFactory::create();

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

        $this->signIn($project->owner);

        $remove = ['id', 'owner_id', 'updated_at', 'created_at', 'deleted_at'];

        // Unset $remove
        $old = array_diff_key($project->getOriginal(), array_flip($remove));

        $new_request = factory(Project::class)->raw(['owner_id' => $project->owner_id]);

        $this->json('PUT', $project->path(), $new_request);

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

        $this->signIn($project->owner);

        $remove = ['id', 'owner_id', 'updated_at', 'created_at', 'project_id', 'deleted_at'];

        $old = array_diff_key($project->tasks->first()->getOriginal(), array_flip($remove));

        $new_request = factory(Task::class)->raw(['completed' => true]);

        $this->json('PUT', $project->tasks->first()->path(), $new_request);

        // Get arrayUnset $remove
        $new = array_diff_key($project->tasks->first()->refresh()->getOriginal(), array_flip($remove));

        tap($project->tasks->first()->activities->last(), function ($activities) use ($old, $new) {

            $this->assertEquals('updated', $activities->description);
            $this->assertInstanceOf(Task::class, $activities->subject);

            $expected = [
                'before' => $old,
                'after' => $new,
            ];

            $this->assertEquals($expected, $activities->changes);
        });

    }

    /** @test */
    /*public function a_project_has_activities()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::create();

        $this->signIn($project->owner);

        $response = $this->json('PUT', $project->path() . '/activities');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'description',
                    'user' => [
                        'name'
                    ],
                ]
            ]]);


        $response->assertJson([
            'data' => [
                [
                    'id' => $project->activitiesWithOwnerAndSubject()->first()->id,
                    'user_id' => $project->owner->id,
                    'subject_type' => $project->activitiesWithOwnerAndSubject()->first()->subject_type,
                    'subject' => ['title' => $project->title],
                    'user' => ['name' => $project->owner->name],
                    'description' => 'created',
                    'updated_at' => $project->updated_at,
                    'created_at' => $project->created_at,
                ]
            ]
        ]);

        $response->assertJsonMissing([
            'password' => $project->owner->password
        ]);
    }*/
}
