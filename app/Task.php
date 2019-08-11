<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use RecordsActivity;

    /**
     * The task's old attributes.
     *
     * @var array
     */
    public $old = [];

    protected $guarded = [];

    protected $touches = ['project'];

    /**
     * @return BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Path into this Task
     *
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->project_id}/tasks/{$this->id}";
    }


    /**
     * The log feed for the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }
}
