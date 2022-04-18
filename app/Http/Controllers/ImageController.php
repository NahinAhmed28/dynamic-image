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
            Intervention::make($image)->orientate()->resize(900, 700)->save($newLocation);
        }

        $image = Image::create([
            'image' => $image_rename,
        ]);

//            $service = Service::create([
//                'serviceTitle' => implode(",", $request->input('serviceTitle', [])),
//                'imageID' => $image['id']
//
//            ]);

        foreach ($request->all() as  $key0=>$rrr){

            if(str_contains($key0 ,'serviceName' )){
//                $place = explode('_' , $key0);

                foreach ($rrr as $key1 => $item) {
                    $service = Service::create([
                        'serviceName' => $item,
                        'imageID' => $image['id']
                    ]);

                    $title = Title::create([
                        'title' => $request->title[$key1],
                        'notes' => $request->notes[$key1],
                        'serviceID' => $service['id']
                    ]);

                }
            }
        }

        foreach ($request->all() as $key2 => $r) {
            if (str_contains($key2, 'personal_sub_title')) {
                $place = explode('_', $key2);
                $sub_title = SubTitle::create([
                    'subtitle' => $r[0],
                    'titleID' => $title['id']-1
                ]);
                $actPlace = ++$place[2];
                foreach ($request->all() as $key3 => $rr1) {
//                    $var = 'personal_child_title_' . $actPlace;

                    if (str_contains($key3, 'personal_child_title')) {

                        foreach ($rr1 as $child) {

                            $child_title = ChildTitle::create([
                                'childTitle' => $rr1[0],
                                'subTitleID' => $sub_title['id']
                            ]);
                        }
                    }
                }
            }
            elseif (str_contains($key2, 'company_sub_title')) {
                $place = explode('_', $key2);
                $sub_title = SubTitle::create([
                    'subtitle' => $r[0],
                    'titleID' => $title['id']
                ]);
                $actPlace = ++$place[2];
                foreach ($request->all() as $key4 => $rr2) {
//                    $var = 'company_child_title_' . $actPlace;

                    if (str_contains($key4, 'company_child_title')) {

                        foreach ($rr2 as $child) {

                            $child_title = ChildTitle::create([
                                'childTitle' => $rr2[0],
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
//          'notes' => 'required',
//      ]);

    }

    public function delete(Request $request, $id)
    {
      $file = DB::table('images')->where('id', $request->id)->value('image');
      File::delete(public_path('/uploads/'.$file));

      DB::table('images')->where('id', $request->id)->delete();
      return back()->with('danger', 'Image has been deleted!');
    }
}
