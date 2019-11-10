<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method create(array $all)
 * @property mixed project
 * @property mixed project_id
 * @property mixed id
 */
class Task extends AbstractModel
{
    use SoftDeletes;

    use RecordsActivity;

    protected $guarded = [];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['project'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean'
    ];


    /**
     * @return BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
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
        return "/api/v1/projects/{$this->project_id}/tasks/{$this->id}";
    }

    public function complete()
    {
        return $this->update([
            'completed' => !$this->completed
        ]);
    }
}
