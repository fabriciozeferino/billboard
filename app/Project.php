<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends AbstractModel
{
    use SoftDeletes;

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
        return "/api/v1/projects/{$this->id}";
    }
}
