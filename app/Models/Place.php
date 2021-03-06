<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function organizers()
    {
        return $this->hasMany(Organizer::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
