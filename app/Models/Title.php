<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subtitles()

    {
        return $this->hasMany(SubTitle::class, 'titleID', 'id');
    }
    public function service()

    {
        return $this->belongsTo(Service::class, 'serviceID', 'id');
    }
}
