<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Project;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return auth()->user()->projects;
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * @param ProjectCreateRequest $request
     * @param Project $project
     * @return RedirectResponse|Redirector
     */
    public function store(ProjectCreateRequest $request, Project $project)
    {
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
     */
    public function update(Project $project, ProjectUpdateRequest $request)
    {
        $project->update($request->all());

        return response()->json([
            'status' => 'successfully',
            'message' => 'Updated successfully'
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

        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return void
     * @throws Exception
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect('projects');
    }
}


