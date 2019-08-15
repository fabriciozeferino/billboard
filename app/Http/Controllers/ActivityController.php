<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Project;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * @var ActivityService
     */
    private $service;

    /**
     * ActivityController constructor.
     * @param ActivityService $service
     */
    public function __construct(ActivityService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param \App\Activity $activity
     * @return void
     */
    public function show(Project $project)
    {
        $activities = $this->service->render($project);

        return response()->json($activities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
