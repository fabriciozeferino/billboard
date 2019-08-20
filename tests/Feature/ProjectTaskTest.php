<?php

namespace Tests\Feature;

use App\Project;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ProjectTaskTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function guest_cannot_manage_tasks()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $this->get("/projects/{$project->id}/tasks")->assertRedirect('login');
        $this->get($project->tasks()->first()->path())->assertRedirect('login');
        $this->get("/projects/{$project->id}/tasks/create")->assertRedirect('login');
        $this->post("/projects/{$project->id}/tasks/", $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        //$this->withoutExceptionHandling();
        $this->signIn();

        $project = ProjectFactory::create();
        $task = factory(Task::class)->raw(['project_id' => $project->id]);


        $this->post($project->path() . '/tasks', $task)
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['title' => $task['title']]);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_tasks()
    {
        $this->signIn();

        $project = ProjectFactory::create();
        $task = factory(Task::class)->raw(['project_id' => $project->id]);

        $this->post($project->path() . '/tasks', $task)
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', $task);
    }

    /** @test */
    public function a_project_can_have_tasks()
    {
        $project = ProjectFactory::create();

        $task = factory(Task::class)->raw([
            'project_id' => $project->id,
        ]);

        $this->actingAs($project->owner)
            ->post($project->path() . '/tasks', $task);

        $this->get($project->path())
            ->assertSee($task['title']);
    }

    /** @test */
    public function a_task_require_a_title()
    {
        $project = ProjectFactory::create();

        $task = factory(Task::class)->raw(['title' => '']);

        $this->actingAs($project->owner)
            ->post($project->path() . '/tasks', $task)
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), [
            'title' => 'Title changed',
            'completed' => '1'
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Title changed',
            'completed' => '1'
        ]);
    }


}
