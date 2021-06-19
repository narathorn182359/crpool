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

        $profileImage ="";
        $files = $request->file('profileImage');
        $destinationPath = public_path('/product/'); // upload path

        if ($filesti = $request->file('profileImageTitel')) {         
            $profileImage = rand().'.'. $filesti->getClientOriginalExtension();
            $filesti->move($destinationPath, $profileImage);
        }
       
        
      $id = DB::table('product')->insertGetId([
        'category'=>$request->category,
        'name' => $request->name,
        'img' => $profileImage,
        'detail'=>$request->detail,
        "created_at" => Carbon::now(),
      ]);

        if ($files) {
            // Define upload path
          
         
            foreach($files as $img) {
              
             // Upload Orginal Image           
            $profileImages = rand().'.'. $img->getClientOriginalExtension();
            $img->move( public_path() . '/product/', $profileImages);
             // Save In Database
              DB::table('product_img')->insert([
               'id_product' => $id,
               'img' =>  $profileImages,
               "created_at" => Carbon::now(),

              ]);
        }
 
        }
        


     
         return back()->with('success', 'บันทึกสำเร็จ');
}


    public function data_product(){


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




 public function data_productget(Request $request ){

  $columns = array(
       0 => 'name',
     );

   $totalData = DB::table('product')->count();
   $totalFiltered = $totalData;
   $limit = $request->input('length');
   $start = $request->input('start');
   $order = $columns[$request->input('order.0.column')];
   $dir = $request->input('order.0.dir');

   if (empty($request->input('search.value'))) {

       $posts = DB::table('product')
           ->offset($start)
           ->limit($limit)
           ->orderBy($order, $dir)
           ->get();

   } else {

       $search = $request->input('search.value');
       $posts = DB::table('product')
           ->orWhere('name', 'LIKE', "%{$search}%")
           ->offset($start)
           ->limit($limit)
           ->orderBy($order, $dir)
           ->get();

       $totalFiltered = DB::table('product')
           ->orWhere('name', 'LIKE', "%{$search}%")
           ->count();

   }

   $data = array();
   if (!empty($posts)) {
       foreach ($posts as $post) {
           $nestedData['img'] ="<img src=".url("/products/".$post->img)." class='img-thumbnail' alt='Cinque Terre' width='100px'>";
           $nestedData['name'] = $post->name;
           $nestedData['options'] = "
           <a href='".url('productedit/'.$post->id)."' class='btn btn-warning  btn-sm'>แก้ไข</a>   
           <a href='javascript:void(0)' class='btn btn-danger  btn-sm  delete_product' data-id=".$post->id." >ลบ</a>
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

public function delete_gallery(Request $request){

  DB::table('gallery')
        ->where('id',$request->id)
        ->delete();


  return   response()->json(200);
}

public function productedit($id){

  $product = DB::table('product')
   ->where('id',$id)
   ->first();

   $data = array(

      'product' => $product,

   );

   return view('admin.editproduct',$data);
}

  public function saveedit($id ,Request $request){


    $profileImage ="";
        $files = $request->file('profileImage');
        $destinationPath = public_path('/products/'); // upload path

        if ($filesti = $request->file('profileImageTitel')) {         
            $profileImage = rand().'.'. $filesti->getClientOriginalExtension();
            $filesti->move($destinationPath, $profileImage);
        }
       
        
         DB::table('product')
         ->where('id',$id)
         ->update([
        'category'=>$request->category,
        'name' => $request->name,
        'img' => $profileImage,
        'detail'=>$request->detail,
        "updated_at" => Carbon::now(),
      ]);

        if ($files) {
            // Define upload path
          
            DB::table('product_img')
            ->where('id_product',$id)
            ->delete();
            foreach($files as $img) {
              
             // Upload Orginal Image           
            $profileImages = rand().'.'. $img->getClientOriginalExtension();
            $img->move( public_path() . '/products/', $profileImages);
             // Save In Database
              DB::table('product_img')
              ->insert([
               'id_product' => $id,
               'img' =>  $profileImages,
               "created_at" => Carbon::now(),

              ]);
        }
 
        }
        


     
         return back()->with('success', 'บันทึกสำเร็จ');


    
  }
  public function delete_product(Request $request){

    DB::table('product')
          ->where('id',$request->id)
          ->delete();
          
          DB::table('product_img')
          ->where('id_product',$request->id)
          ->delete();
    return   response()->json(200);
 }

  

}
 
 
