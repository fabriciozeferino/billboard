<?php

namespace Tests\Feature;

use App\Task;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTaskTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function guest_cannot_manage_tasks()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $this->json('GET', self::URI . '/projects/1/tasks', [])
            ->assertStatus(401)
            ->assertJsonStructure(SELF::RESPONSE_401);

        $this->json('GET', self::URI . '/projects/1/tasks/1', [])
            ->assertStatus(401)
            ->assertJsonStructure(SELF::RESPONSE_401);

        $this->json('POST', self::URI . '/projects/1/tasks', [], [])
            ->assertStatus(401)
            ->assertJsonStructure(SELF::RESPONSE_401);

        $this->json('GET', self::URI . '/projects/1/tasks/1/edit', [])
            ->assertStatus(401)
            ->assertJsonStructure(SELF::RESPONSE_401);


        $this->json('DELETE', self::URI . '/projects/1/tasks/1', [])
            ->assertStatus(401)
            ->assertJsonStructure(SELF::RESPONSE_401);

        $this->assertGuest();
    }

    /** @test */
    public function the_owner_of_a_project_may_add_tasks()
    {
        $owner = ($this->signIn())['user'];

        $project = ProjectFactory::ownedBy($owner)->create();

        $task = factory(Task::class)->raw(['project_id' => $project->id]);

        $this->json('POST', $project->path() . '/tasks', $task)
            ->assertStatus(201);

        $this->assertDatabaseHas('tasks', $task);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = ProjectFactory::create();

        $task = factory(Task::class)->raw(['project_id' => $project->id]);

        $this->json('POST', $project->path() . '/tasks', $task)
            ->assertStatus(403);
    }

    /** @test */
    public function the_owner_of_a_project_may_update_tasks()
    {
        $user = ($this->signIn())['user'];

        $project = ProjectFactory::ownedBy($user)->withTasks(1)->create();

        $task = factory(Task::class)->raw(['project_id' => $project->id]);

        $this->json('PUT', $project->path() . '/tasks/' . $project->tasks->first()->id, $task)
            ->assertStatus(201);

        $this->assertDatabaseHas('tasks', $task);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_tasks()
    {
        $this->signIn();

        // Project belong to other user.
        $project = ProjectFactory::withTasks(1)->create();

        $task = factory(Task::class)->raw(['project_id' => $project->id]);

        $this->json('PUT', $project->path() . '/tasks/' . $project->tasks->first()->id, $task)
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', $task);
    }

    /** @test */
    public function a_task_require_a_title()
    {
        $owner = ($this->signIn())['user'];

        $project = ProjectFactory::ownedBy($owner)->withTasks(3)->create();

        $task = factory(Task::class)->raw([
            'project_id' => $project->id,
            'title' => ''
        ]);

        $this->json('POST', $project->path() . '/tasks', $task)
            ->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'title'
                ]
            ]);

        $this->json('PUT', $project->path() . '/tasks/' . $project->tasks->first()->id, $task)
            ->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'title'
                ]
            ]);
    }


}
