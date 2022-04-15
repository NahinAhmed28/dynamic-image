<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function image()

    {
        return $this->belongsTo(Image::class, 'imageID', 'id');
    }

    public function title()
    {
        return $this->hasOne(Title::class , 'serviceID', 'id');
    }

}
