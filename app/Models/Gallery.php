<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function thumbnail(){
        return $this->hasOne(GalleryImage::class)->orderBy('id');
    }

    public function images(){
        return $this->hasMany(GalleryImage::class);
    }
}
