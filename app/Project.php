<?php

namespace App;

use App\Http\Resources\ActivityResource;


class Project extends AbstractModel
{
    use RecordsActivity;

    protected $guarded = [];

    /**
     * @param $task
     * @return Model
     */
    public function addTask($task)
    {
        return $this->tasks()->create($task);
    }

    /**
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->id}";
    }

    /**
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function activitiesResource(){

        return new ActivityResource($this->activity()->paginate());
    }
}
