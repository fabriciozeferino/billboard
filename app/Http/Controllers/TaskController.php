<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Project;
use App\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * @param Project $project
     * @param TaskCreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(Project $project, TaskCreateRequest $request)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        $project->addTask($request->all());

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return void
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return void
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param Task $task
     * @param TaskUpdateRequest $request
     * @return void
     */
    public function update(Project $project, Task $task, TaskUpdateRequest $request)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        $project->tasks()->find($task->id)->update($request->all());

        return redirect($project->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return void
     */
    public function destroy(Task $task)
    {
        //
    }
}
