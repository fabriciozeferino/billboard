<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Project;
use App\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @param Task $task
     * @return LengthAwarePaginator
     * @throws AuthorizationException
     */
    public function index(Project $project, Task $task)
    {
        $this->authorize('view', $project);

        return $project->tasks()->paginate();
    }

    /**
     * Store a new resource.
     *
     * @param Project $project
     * @param TaskCreateRequest $request
     * @param Task $task
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function store(TaskCreateRequest $request, Task $task)
    {
        $this->authorize('create', $task);

        $task = $task->create($request->all());

        return response()->json($task, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @param Task $task
     * @return void
     * @throws AuthorizationException
     */
    public function show(Project $project, Task $task)
    {
        $this->authorize('view', $project);
        $this->authorize('view', $task);

        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param Task $task
     * @param TaskUpdateRequest $request
     * @return void
     * @throws AuthorizationException
     */
    public function update(Project $project, Task $task, TaskUpdateRequest $request)
    {
        $this->authorize('view', $project);
        $this->authorize('view', $task);

        $task->update($request->all());

        return response()->json([
            'data' => $task
        ], 204);
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
