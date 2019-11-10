<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Project;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->paginate(10);

        return response()->json([
            'data' => $projects
        ], 200);
    }


    /**
     * @param ProjectCreateRequest $request
     * @param Project $project
     * @return JsonResponse
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
     * @param ProjectUpdateRequest $request
     * @return JsonResponse
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
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return response()->json([
            'data' => [
                'project' => $project,
                'tasks' => $project->tasks()->get()
                ]
        ], 200);
    }

    /**
     * Soft delete Model.
     *
     * @param Project $project
     * @return JsonResponse
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
     * @return JsonResponse
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


    /**
     * @return JsonResponse
     */
    public function trash()
    {
        $projects = Project::onlyTrashed()->where('owner_id', auth()->id())->paginate();

        return response()->json([
            'data' => $projects
        ], 200);
    }
}


