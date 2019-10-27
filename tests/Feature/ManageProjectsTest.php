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

        $header = ['Content-Type' => 'application/json'];
        $response_401 = [
            'message'
        ];

        $this->json('GET', 'api/v1/projects', $header)
            ->assertStatus(401)
            ->assertJsonStructure($response_401);

        $this->json('GET', $project->path(), $header)
            ->assertStatus(401)
            ->assertJsonStructure($response_401);

        $this->json('POST', 'api/v1/projects', $header, $project->toArray())
            ->assertStatus(401)
            ->assertJsonStructure($response_401);

        $this->json('GET', $project->path() . '/edit', $header)
            ->assertStatus(401)
            ->assertJsonStructure($response_401);


        $this->json('DELETE', $project->path(), $header)
            ->assertStatus(401)
            ->assertJsonStructure($response_401);

        $this->assertGuest();
    }


    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $response = $this->signIn();

        $this->assertAuthenticated();

        /*$this->json('GET', '/api/v1/projects/create')
            ->assertStatus(200);*/

        $attributes = factory(Project::class)->raw(["owner_id" => $response['user']->id]);
        //$attributes = ProjectFactory::ownedBy($response['user'])->create();

        //dd($attributes);

        $response = $this->actingAs($response['user'])->json('POST', 'api/v1/projects', $attributes);

        $response->assertStatus(201);

        $this->assertDatabaseHas('projects', $attributes);
    }


    /** @test */
    public function an_authenticated_user_can_update_a_project()
    {
        $user = $this->signIn();

        $this->assertAuthenticated();

        $project = ProjectFactory::ownedBy($user['user'])->create();

        $randon_fields = factory(Project::class)->raw(["owner_id" => $project->owner_id]);

        $response = $this->json('PUT', $project->path(), $randon_fields);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'id',
                'owner_id',
                'title'
            ]
        ]);

        $this->assertDatabaseHas('projects', $randon_fields);
    }


    /** @test */
    public function an_authenticated_user_can_delete_and_force_delete_a_project()
    {
        $this->withoutExceptionHandling();

        $response = $this->signIn();

        $this->assertAuthenticated();

        $project = ProjectFactory::ownedBy($response['user'])->create();

        $this->assertDatabaseHas('projects', $project->only('id', 'owner_id', 'title'));

        $response = $this->json('DELETE', $project->path());

        $response->assertStatus(200);

        $this->assertSoftDeleted($project);

        $this->json('DELETE', "api/v1/projects/1/delete");

        $this->assertDatabaseMissing('projects', $project->only('id'));
    }

    /** @test */
    public function an_authenticated_user_can_not_delete_a_project_of_others()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->delete($project->path(), [])->assertStatus(403);
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
        $user = $this->signIn();

        ProjectFactory::ownedBy($user['user'])->create();

        $response = $this->json('GET', 'api/v1/projects');

        $response->assertStatus(200);


        /*$response->assertJsonStructure([
            '*' => [
                'id',
                'owner_id',
                'title'
            ]
        ]);*/
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

        $response = $this->json('POST', 'api/v1/projects', $attributes);

        $response->assertStatus(422);

        $message = $response->decodeResponseJson()['message'];

        $response->assertJson([
            "message" => $message,
            "errors" => [
                "title" => [
                ]
            ]
        ]);
    }


    /** @test */
    public
    function a_project_require_a_description()
    {
        $this->signIn();

        $attributes = factory(Project::class)->raw(['description' => '']);

        $response = $this->json('POST', 'api/v1/projects', $attributes);

        $response->assertStatus(422);

        $message = $response->decodeResponseJson()['message'];

        $response->assertJson([
            "message" => $message,
            "errors" => [
                "description" => [
                ]
            ]
        ]);
    }
}
