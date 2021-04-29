<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }

    public function team() {
        return $this->hasMany(TeamMembers::class);
    }
}
