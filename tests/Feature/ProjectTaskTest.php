<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cannot_manage_projects()
    {
        //$project = factory('App\Project')->create();

        $this->get('/projects/1/tasks')->assertRedirect('login');
        //$this->get($project->path())->assertRedirect('login');
        //$this->get('/projects/create')->assertRedirect('login');
        //$this->post('/projects', $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->post($project->path() . '/tasks', ['body' => 'testtest'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'task body']);
    }

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $this->post($project->path() . '/tasks', ['body' => 'test test']);

        $this->get($project->path())
            ->assertSee('test test');
    }

    /** @test */
    public function a_task_require_a_body()
    {
        $this->signIn();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->post($project->path() . '/tasks')->assertSessionHasErrors('body');
    }
}
