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


    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);/*->latest()->paginate(5);*/
    }

    public function activityResponse()
    {
        return $this->activity()->with('user')->paginate(5);

    }

    /**
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->id}";
    }
}
