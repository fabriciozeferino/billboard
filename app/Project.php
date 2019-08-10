<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
    /**
     * The project's old attributes.
     *
     * @var array
     */
    public $old = [];

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
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * @param $description
     */
    public function recordActivity($description)
    {
        $this->activities()->create([
            'project_id' => $this->id,
            'description' => $description,
            'changes' => $this->activityChanges($description)
        ]);
    }


    /**
     * @param $description
     * @return array|null
     */
    private function activityChanges($description)
    {
        if (!empty($this->old)) {
            return [
                // get differences from arrays
                'before' => array_diff($this->old, $this->getAttributes()),
                // unset array from values
                'after' => array_diff_key($this->getChanges(), array_flip(['id', 'owner_id', 'project_id', 'updated_at',]))
            ];
        }

        return null;
    }
}
