<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildTitle extends Model
{
    use HasFactory;

    protected $table = 'childtitles';
    protected $guarded = ['id'];

    public function subtitles()

    {
        return $this->belongsTo(SubTitle::class, 'subTitleID', 'id');
    }



}
