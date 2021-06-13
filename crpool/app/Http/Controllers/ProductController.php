<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function index(){

      
        return view('admin.addproduct');
     }

     public function store(Request $request)
     {
        

      $id = DB::table('product')->insertGetId([
          'category'=>$request->category,
          'name' => $request->name,
          'detail'=>$request->detail,
          "created_at" => Carbon::now(),
        ]);


        if ($files = $request->file('profileImage')) {
             // Define upload path
             $destinationPath = public_path('/product/'); // upload path
             foreach($files as $img) {
              // Upload Orginal Image           
             $profileImage = rand().'.'. $img->getClientOriginalExtension();
             $img->move($destinationPath, $profileImage);
              // Save In Database
               DB::table('product_img')->insert([
                'id_product' => $id,
                'img' =>  $profileImage,
                "created_at" => Carbon::now(),

               ]);
         }
  
         }
         return back()->with('success', 'บันทึกสำเร็จ');
}
}
