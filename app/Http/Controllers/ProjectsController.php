<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create(ProjectRequest $request)
    {
        Project::create(request(['title', 'description']));

        return redirect('/projects');
    }
}


