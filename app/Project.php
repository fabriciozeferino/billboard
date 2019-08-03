<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
    protected $guarded = [];


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
        return $this->belongsTo('App\User');
    }

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
        return $this->hasMany('App\Task');
    }
}
