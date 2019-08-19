<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Project;


class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * @param ProjectCreateRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProjectCreateRequest $request, Project $project)
    {
        $project->create($request->all());

        return redirect($project->path());
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * @param Project $project
     * @param ProjectUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, ProjectUpdateRequest $request)
    {
        $project->update($request->all());

        return redirect()->back(302)->with('success', 'Register updated successful');
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        //dd($project->activitiesResource()->resource);

        //return response($project->activitiesResource()->resource, 200);

        return view('projects.show', [
            'project' => $project,
            //'activities' => $project->activitiesResource()->resource
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return void
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect('projects');
    }
}


