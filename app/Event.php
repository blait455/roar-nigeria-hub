<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'description'];

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

}
