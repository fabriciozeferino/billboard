<?php

namespace App;



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
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function activitiesWithOwnerAndSubject()
    {
        return $this->hasMany(Activity::class)
            ->with(['user', 'subject'])
            ->latest()
            ->paginate(5);
    }

    /**
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->id}";
    }
}
