<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Carbon\Carbon;
use File;

class ImageController extends Controller
{
    public function store(Request $request)
    {
      $validated = $request->validate([
          'image' => 'required',
          'title' => 'required',
          'desc' => 'required',
          'sub_title_a' => 'required',
          'sub_title_b' => 'required',
          'a_title_x' => 'required',
          'a_title_z' => 'required',
          'b_title_x' => 'required',
          'b_title_z' => 'required',
          'notes' => 'required',
      ]);

      $a_title_z = json_encode($request->a_title_z);
      $b_title_z = json_encode($request->b_title_z);
      $b_title_x = json_encode($request->b_title_x);
      $a_title_x = json_encode($request->a_title_x);
      if (!empty($request->image)) {
        $image = $request->file('image');
        $image_rename = rand().'.'.$image->getClientOriginalExtension();
        $newLocation = public_path('/uploads/'.$image_rename);
        Image::make($image)->fit(1920 ,1080 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);
      }

      DB::table('images')->insert([
        'image' => $image_rename,
        'title' => $request->title,
        'desc' => $request->desc,
        'sub_title_a' => $request->sub_title_a,
        'a_title_x' => $a_title_x,
        'a_title_z' => $a_title_z,
        'sub_title_b' => $request->sub_title_b,
        'b_title_x' => $b_title_x,
        'b_title_z' => $b_title_z,
        'notes' => $request->notes,
        'created_at' => now(),
      ]);

      return back()->with('success', 'Your images has been added!');
    }

    public function delete(Request $request)
    {
      $file = DB::table('images')->where('id', $request->id)->value('image');
      File::delete(public_path('/uploads/'.$file));

      DB::table('images')->where('id', $request->id)->delete();
      return back()->with('danger', 'Image has been deleted!');
    }
}
