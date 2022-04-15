<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTitle extends Model
{
    use HasFactory;

    protected $table = 'subtitles';
    protected $guarded = ['id'];

    public function childtitles()

    {
        return $this->hasMany(ChildTitle::class, 'subTitleID', 'id');
    }

    public function title()

    {
        return $this->belongsTo(Title::class, 'titleID', 'id');
    }


}
