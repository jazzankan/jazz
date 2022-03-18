<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpiderData extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
}
