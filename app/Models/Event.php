<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
