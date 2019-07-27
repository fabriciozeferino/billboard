<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function guest_cannot_create_projects()
    {
        $attributes = factory('App\Project')->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function guest_may_not_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    /** @test */
    public function guest_may_not_view_a_single_projects()
    {
        $project = factory('App\Project')->create();

        $this->get($project->path())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->be(factory('App\User')->create());

        $attributes = factory('App\Project')->raw();

        $this->post('/projects', $attributes)->assertRedirect('/projects');
    }

    /** @test */
    public function a_user_can_view_their_projects()
    {
        $this->be(factory('App\User')->create());

        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);


        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->be(factory('App\User')->create());

        //$this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }


    /** @test */
    public function a_project_require_a_title()
    {
        $this->be(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_require_a_description()
    {
        $this->be(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_project_require_an_owner()
    {
        $this->be(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['owner_id' => null]);

        $this->post('/projects', $attributes)->assertSessionHasErrors('owner_id');
    }
}
