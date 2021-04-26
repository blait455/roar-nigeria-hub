<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['event_id','name'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
