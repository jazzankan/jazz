<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function spiderdata()
    {
        return $this->hasOne(SpiderData::class);
    }
}
