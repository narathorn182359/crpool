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
            'name' => $name,
            
        );
        return view('admin.gallery',$data);
     }

     public function galleryedit($id){

       $gallery = DB::table('gallery')
        ->where('id',$id)
        ->first();

        $data = array(

           'gallery' => $gallery,

        );

        return view('admin.editgallery',$data);
     }

     
     public function galleryeditsave($id, Request $request){

      
       if ($files = $request->file('profileImage')) {
      
            $destinationPath = public_path('/gallerys/');         
            $profileImage =rand().'.'. $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
    
              DB::table('gallery')
              ->where('id',$id)
              ->update([
               'img' =>  $profileImage,
               "updated_at" => Carbon::now(),
              ]);
       
 
        }


        return back()->with('success', 'บันทึกสำเร็จ');
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
     public function delete_gallery(Request $request){

        DB::table('gallery')
              ->where('id',$request->id)
              ->delete();

      
        return   response()->json(200);
     }

     public function data_gallery(Request $request ){

          $columns = array(
               0 => 'name',
             );
       
           $totalData = DB::table('gallery')->count();
           $totalFiltered = $totalData;
           $limit = $request->input('length');
           $start = $request->input('start');
           $order = $columns[$request->input('order.0.column')];
           $dir = $request->input('order.0.dir');
       
           if (empty($request->input('search.value'))) {
       
               $posts = DB::table('gallery')
                   ->offset($start)
                   ->limit($limit)
                   ->orderBy($order, $dir)
                   ->get();
       
           } else {
       
               $search = $request->input('search.value');
               $posts = DB::table('gallery')
                   ->orWhere('name', 'LIKE', "%{$search}%")
                   ->offset($start)
                   ->limit($limit)
                   ->orderBy($order, $dir)
                   ->get();
       
               $totalFiltered = DB::table('gallery')
                   ->orWhere('name', 'LIKE', "%{$search}%")
                   ->count();
       
           }
       
           $data = array();
           if (!empty($posts)) {
               foreach ($posts as $post) {
                   $nestedData['img'] ="<img src=".url("/gallerys/".$post->img)." class='img-thumbnail' alt='Cinque Terre' width='100px'>";
                   $nestedData['category'] = $post->name;
                   $nestedData['options'] = "
                   <a href='".url('gallery/'.$post->id)."' class='btn btn-warning  btn-sm'>แก้ไข</a>   
                   <a href='javascript:void(0)' class='btn btn-danger  btn-sm  delete_gallery' data-id=".$post->id." >ลบ</a>
                   ";
                   $data[] = $nestedData;
               }
           }
       
           $json_data = array(
               "draw" => intval($request->input('draw')),
               "recordsTotal" => intval($totalData),
               "recordsFiltered" => intval($totalFiltered),
               "data" => $data,
           );
       
           echo json_encode($json_data);

     }
}
