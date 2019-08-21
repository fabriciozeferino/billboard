<?php

namespace App\Http\Controllers;

use App\Project;

class ActivityController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return void
     */
    public function show(Project $project)
    {
        return response()->json($project->activitiesWithOwnerAndSubject());
    }
}
