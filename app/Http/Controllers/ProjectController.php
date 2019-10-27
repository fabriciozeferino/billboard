<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Project;
use App\User;
use DB;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return auth()->user()->projects;
        /*
        //$this->authorize('view');

        $posts = Project::where('owner_id', auth()->id())->with('owner')->paginate();

        return $posts;
        dd($posts);


        $projects = Project::select('*')
            ->whereColumn('owner_id', 'projects.owner_id')
            ->latest()
            ->getQuery();



        $users = User::select('*')
            ->selectSub($projects, 'last_login_at')
            ->get();

        return $users;

        return auth()->user()->with('projects')->paginate();
        return auth()->user()->projects;
        return auth()->user()->projects()->paginate();
        return DB::table('projects')
            ->where('projects.owner_id', auth()->user()->id)->get();*/
        /*return auth()->user()->projects;
        return auth()->user();

        //select * from `projects` where `projects`.`owner_id` = 4 and `projects`.`owner_id` is not null order by `updated_at` desc
        dd(auth()->user()->id);*/


    }

    /**
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create');

        return view('projects.create');
    }

    /**
     * @param ProjectCreateRequest $request
     * @param Project $project
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function store(ProjectCreateRequest $request, Project $project)
    {
        $this->authorize('create', $project);

        $project = $project->create($request->all());

        return response()->json($project, 201);
    }

    /**
     * @param Project $project
     * @return Factory|View
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * @param Project $project
     * @param ProjectUpdateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Project $project, ProjectUpdateRequest $request)
    {
        $this->authorize('update', $project);

        $project->update($request->all());

        return response()->json([
            'data' => $project
        ], 200);
    }

    /**
     * @param Project $project
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return response()->json([
            'data' => $project
        ], 200);
    }

    /**
     * Soft delete Model.
     *
     * @param Project $project
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return response()->json([
            'status' => 'successfully',
            'message' => 'Deleted successfully'
        ], 200);
    }

    /**
     * Hard delete the Model.
     *
     * @param $id
     * @return void
     * @throws AuthorizationException
     */
    public function forceDelete($id)
    {
        $project = Project::withTrashed()->find($id);

        $this->authorize('forceDelete', $project);

        $project->forceDelete();

        return response()->json([
            'status' => 'successfully',
            'message' => 'Deleted successfully'
        ], 200);
    }
}


