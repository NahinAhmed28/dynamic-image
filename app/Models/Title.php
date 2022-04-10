<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    public function subtitles()

    {
        return $this->hasMany(ChildTitle::class, 'subTitleID', 'id');
    }
    public function images()

    {
        return $this->belongsTo(Image::class, 'imageID', 'id');
    }
}
