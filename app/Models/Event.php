<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [
        'published_at'
    ];

    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attachments(){
        return $this->hasMany(EventAttachment::class);
    }

    public function contactPersons(){
        return $this->hasMany(EventContactPerson::class);
    }

    public function schedules(){
        return $this->hasMany(EventSchedule::class);
    }
}
