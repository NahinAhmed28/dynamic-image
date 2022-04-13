<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;


class Image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function titles()
    {
        return $this->hasOne(Title::class , 'imageID', 'id');
    }


}
