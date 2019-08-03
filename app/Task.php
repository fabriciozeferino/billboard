<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
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
}
