<?php

namespace Tests\Feature;

use App\Project;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTaskTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function guest_cannot_manage_projects()
    {
        //$project = factory(Project::class)->create();

        $this->get('/projects/1/tasks')->assertRedirect('login');
        //$this->get($project->path())->assertRedirect('login');
        //$this->get('/projects/create')->assertRedirect('login');
        //$this->post('/projects', $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->post($project->path() . '/tasks', ['body' => 'testtest'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'task body']);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_tasks()
    {
        //$this->withoutExceptionHandling();
        $this->signIn();

        $project = factory(Project::class)->create();

        //$task = $project->addTask(['body' => 'tesyhhhhhht']);
        $task = factory(Task::class)->raw();
        $this->post($project->path() . '/tasks', $task)
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', $task);
    }

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = factory(Project::class)->create([
            'owner_id' => auth()->id()
        ]);

        $task = factory(Task::class)->raw([
            'project_id' => $project->id,
            //'owner_id' => $project->owner_id
        ]);

        $this->post($project->path() . '/tasks', $task);

        $this->get($project->path())
            ->assertSee($task['body']);
    }

    /** @test */
    public function a_task_require_a_body()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $task = factory(Task::class)->raw(['body' => '']);

        $this->post($project->path() . '/tasks', $task)
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            factory(Project::class)->raw()
        );

        $task = $project->addTask(factory(Task::class)->raw());

        $this->patch($task->path(), [
            'body' => 'Body changed',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'Body changed',
            'completed' => true
        ]);
    }


}
