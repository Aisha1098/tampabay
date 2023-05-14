<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'is_featured',
        'start_at',
        'name',
        'desc',
        'location',
    ];

    protected $casts = [
        'start_at' => 'datetime:Y-m-d',
    ];
    
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class)->where('active', 1);
    }
}
