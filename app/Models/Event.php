<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function host(){
        return $this->belongsToMany(Group::class);
    }

    public function faq(){
        return $this->hasMany(FAQ::class);
    }
}
