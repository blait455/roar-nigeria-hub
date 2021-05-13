<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $fillable = [
        'startup_id', 'incubation_id', 'name', 'phone', 'skill', 'email', 'image'
    ];

    public function startup()
    {
        return $this->belongsTo(Startup::class, 'startup_id');
    }
}
