<?php

namespace App\Http\Controllers;

use App\Models\ChildTitle;
use App\Models\SubTitle;
use App\Models\Title;
//use App\Models\Image;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Intervention\Image\Image;
use Carbon\Carbon;
//use File;

class ImageController extends Controller
{

    public function store(Request $request)
    {
//        dd($request->all());

        if (!empty($request->image)) {
            $image = $request->file('image');
            $image_rename = rand().'.'.$image->getClientOriginalExtension();
            $newLocation = public_path('/uploads/'.$image_rename);
            Image::make($image)->fit(1920 ,1080 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);
        }

        DB::table('images')->insert(
            [
                'image' =>  $image_rename,
                'notes' => $request->notes,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

//        $image =  Image::create([
//            'image' =>  $image_rename,
//            'notes' => $request->notes,
//        ]);

        $title =  Title::create([
           'title' => $request->title
        ]);

        foreach($request->all() as  $key=>$r){
            if(str_contains($key ,'sub_title' )){
                $place = explode('_' , $key);
                $sub_title = SubTitle::create([
                    'subtitle' => $r[0],
                    'titleID' => $title['id']
                ]);
                $actPlace= ++$place[2];
                foreach ($request->all() as $key2=>$rr){
                    $var = 'child_title_'.$actPlace;

                    if($key2 == $var){

                        foreach($rr as $child){
                            $child_title = ChildTitle::create([
                                'childTitle' => $child,
                                'subTitleID' => $sub_title['id']
                            ]);
                        }
                    }
                }
            }
        }

        return back()->with('success', 'Your images has been added!');


//      $validated = $request->validate([
//          'image' => 'required',
//          'title' => 'required',
//          'sub_title_a' => 'required',
//          'sub_title_b' => 'required',
//          'a_title_x' => 'required',
//          'a_title_z' => 'required',
//          'b_title_x' => 'required',
//          'b_title_z' => 'required',
//          'notes' => 'required',
//      ]);

//      $a_title_z = json_encode($request->a_title_z);
//      $b_title_z = json_encode($request->b_title_z);
//      $b_title_x = json_encode($request->b_title_x);
//      $a_title_x = json_encode($request->a_title_x);




//      DB::table('images')->insert([
//        'image' => $image_rename,
//        'title' => $request->title,
////        'desc' => $request->desc,
//        'sub_title_a' => $request->sub_title_a,
//        'a_title_x' => $a_title_x,
//        'a_title_z' => $a_title_z,
//        'sub_title_b' => $request->sub_title_b,
//        'b_title_x' => $b_title_x,
//        'b_title_z' => $b_title_z,
//        'notes' => $request->notes,
//        'created_at' => now(),
//      ]);
//
//      return back();
    }

    public function delete(Request $request)
    {
      $file = DB::table('images')->where('id', $request->id)->value('image');
      File::delete(public_path('/uploads/'.$file));

      DB::table('images')->where('id', $request->id)->delete();
      return back()->with('danger', 'Image has been deleted!');
    }
}
