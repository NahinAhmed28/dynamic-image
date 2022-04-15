<?php

namespace App\Http\Controllers;

use App\Models\ChildTitle;
use App\Models\Service;
use App\Models\SubTitle;
use App\Models\Title;
use App\Models\Image;
use Intervention\Image\Facades\Image as Intervention;
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
            $image_rename = rand() . '.' . $image->getClientOriginalExtension();
            $newLocation = public_path('/uploads/' . $image_rename);
//            Intervention::make($image)->fit(1080 ,1080 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);
            Intervention::make($image)->orientate()->resize(1200, 900)->save($newLocation);
        }


        $image = Image::create([
            'image' => $image_rename,
            'notes' => $request->notes,
        ]);


//        $service = Service::create([
//            'services_name' => $request->services[''],
////            'services_name' => implode(",",$request->input('services',[])),
//            'imageID' => $image['id']
//        ]);



            $service = Service::create([
                'serviceTitle' => implode(",", $request->input('serviceTitle', [])),
//                'serviceTitle' =>  array_keys(array_filter( $request->input('serviceTitle', []))),
                'imageID' => $image['id']

            ]);


        $title =  Title::create([
           'title' => $request->title,
           'serviceID' => $service['id']

        ]);


        foreach($request->all() as  $key=>$r){
            if(str_contains($key ,'sub_title' )){
                $place = explode('_' , $key);
                $sub_title = SubTitle::create([
                    'subtitle' => $r[0],
                    'titleID' => $title['id']
                ]);
                $actPlace = ++$place[2];
                foreach ($request->all() as $key2=>$rr){
                    $var = 'child_title_'.$actPlace;

                    if(str_contains($key2 , $var)){

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

    public function delete(Request $request, $id)
    {
      $file = DB::table('images')->where('id', $request->id)->value('image');
      File::delete(public_path('/uploads/'.$file));

      DB::table('images')->where('id', $request->id)->delete();
      return back()->with('danger', 'Image has been deleted!');
    }
}
