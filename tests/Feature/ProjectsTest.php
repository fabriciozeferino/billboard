<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;

 class ProjectsTest extends TestCase
{
    use withFaker, RefreshDatabase;


    public function test_a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

     public function test_a_user_can_view_a_project()
     {
         $this->withoutExceptionHandling();

         $project = factory('App\Project')->create();

         $this->get('/projects/' . $project->id )
             ->assertSee($project->title)
             ->assertSee($project->description);
     }


     public function test_a_project_require_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

     public function test_a_project_require_a_description()
     {
         $attributes = factory('App\Project')->raw(['description' => '']);

         $this->post('/projects', $attributes)->assertSessionHasErrors('description');
     }


}
