<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function artists()
    {
        return $this->hasMany(Artist::class);
    }

    public function organizers()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function places()
    {
        return $this->belongsTo(Place::class);
    }
}
