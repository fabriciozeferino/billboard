<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'changes' => 'array'
    ];

    /**
     * Get the subject of the log.
     *
     */
    public function subject()
    {
        return $this->morphTo();
    }
}
