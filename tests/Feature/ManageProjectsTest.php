<?php

namespace Tests\Feature;

use App\Project;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function guest_cannot_manage_projects()
    {
        $project = ProjectFactory::create();

        $this->get('/projects')->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
        $this->get('/projects/create')->assertRedirect('login');
        $this->post('/projects', $project->toArray())->assertRedirect('login');
        $this->get($project->path() . '/edit')->assertRedirect('login');
    }


    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

        $attributes = factory(Project::class)->raw(["owner_id" => auth()->id()]);

        $response = $this->post('/projects', $attributes);

        $response->assertStatus(302);

        $this->assertDatabaseHas('projects', $attributes);

        $project = Project::where($attributes)->first();

        $this->get($project->path())
            ->assertSee($attributes['title'])
            ->assertSee($attributes['description']);
    }


    /** @test */
    public function an_authenticated_user_can_update_a_project()
    {
        $this->withoutExceptionHandling();
        $project = ProjectFactory::create();

        $randon_fields = factory(Project::class)->raw(["owner_id" => $project->owner_id]);

        $this->actingAs($project->owner)
            ->patch($project->path(), $randon_fields);

        $this->assertDatabaseHas('projects', $randon_fields);

        foreach ($randon_fields as $value) {
            $this->get($project->path())->assertSee($value);
        }

        $this->get($project->path() . '/edit')->assertStatus(200);

    }


    /** @test */
    public function an_authenticated_user_can_not_update_a_project_of_others()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->patch($project->path(), [])->assertStatus(403);
    }


    /** @test */
    public
    function a_user_can_view_their_projects()
    {
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)->get($project->path())
            ->assertSee($project->title);
    }

    /** @test */
    public
    function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->get($project->path())->assertStatus(403);
    }


    /** @test */
    public
    function a_project_require_a_title()
    {
        $this->signIn();

        $attributes = factory(Project::class)->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }


    /** @test */
    public
    function a_project_require_a_description()
    {
        $this->signIn();

        $attributes = factory(Project::class)->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
}
