<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function host(){
        return $this->belongsTo(Group::class);
    }

    public function attendees(){
        return $this->hasMany(User::class);
    }

    public function held(){
        return $this->belongsTo(Location::class);
    }
}
