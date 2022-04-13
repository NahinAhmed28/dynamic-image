<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $image = Image::get();
        return view ('dashboard',compact('image'));
    }
}
