<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;


    public function places()
    {
        return $this->belongsTo(Place::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
