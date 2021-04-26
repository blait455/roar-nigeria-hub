<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incubation extends Model
{
    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }
}
