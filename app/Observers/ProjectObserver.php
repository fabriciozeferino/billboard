<?php

namespace App\Observers;

use App\Log;
use App\Project;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param \App\Project $project
     * @return void
     */
    public function created(Project $project)
    {
        $project->recordLog('created');
    }

    /**
     * Handle the project "updated" event.
     *
     * @param \App\Project $project
     * @return void
     */
    public function updated(Project $project)
    {
        $project->recordLog('updated');
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param \App\Project $project
     * @return void
     */
    public function deleted(Project $project)
    {
        $project->recordLog('deleted');

    }
}
