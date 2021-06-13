<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class GalleryController extends Controller
{
     public function index($id,$name){

        $data = array(
            'id' => $id,
            'name' => $name
        );
        return view('admin.gallery',$data);
     }

     public function store(Request $request)
     {
        request()->validate([
             'profileImage.*' => 'required',
        ]);
        if ($files = $request->file('profileImage')) {
             // Define upload path
             $destinationPath = public_path('/gallery/'); // upload path
             foreach($files as $img) {
              // Upload Orginal Image           
             $profileImage =rand().'.'. $img->getClientOriginalExtension();
             $img->move($destinationPath, $profileImage);
              // Save In Database
               DB::table('gallery')->insert([
                'type' => $request->type,
                'name' => $request->name,
                'img' =>  $profileImage,
                "created_at" => Carbon::now(),

               ]);
         }
  
         }
         return back()->with('success', 'บันทึกสำเร็จ');
  
     }
}
