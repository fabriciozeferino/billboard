<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * @param Project $project
     * @return Factory|View
     */
    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    /**
     * @param ProjectRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ProjectRequest $request)
    {
        //dd($request->all());
        $project = Project::create($request->all());

        return redirect($project->path());
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('projects.create');
    }
}


