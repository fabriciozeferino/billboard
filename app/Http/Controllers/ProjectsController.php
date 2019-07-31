<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function store(ProjectRequest $request)
    {
        //dd($request->all());
        $project = Project::create($request->all());

        return redirect($project->path() );
    }

    public function create()
    {
        return view('projects.create');
    }
}


