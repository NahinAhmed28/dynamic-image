<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Title;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $data = [
            'images' =>Image::get(),
            'titles' =>Title::get(),
        ];

        return view ('dashboard',$data);
    }
    public function viewDetails($id)
    {

        $data = [

            'image' =>Image::where ('id', $id )->get(),

        ];

        return view ('dashboard',$data);
    }
}
