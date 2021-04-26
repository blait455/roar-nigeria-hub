<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

    public function startups()
    {
        return $this->belongsToMany(Startup::class);
    }
}
