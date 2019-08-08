<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
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

    /**
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @param $description
     */
    public function recordLog($description)
    {
        $this->logs()->create([
            'project_id' => $this->id,
            'description' => $description,
        ]);
    }


    public function logs()
    {
        return $this->morphMany(Log::class, 'subject')->latest();
    }
}
