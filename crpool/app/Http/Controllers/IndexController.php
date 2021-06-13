<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public  function index(){

        return view('crpool.index');
    }

    public  function contact(){


        return view('crpool.contact');
    }

    public  function product(){

        $product = DB::table('product')->get();

        $data = array(
            'product' => $product
        );

        return view('crpool.product',$data);
    }


    public  function services(){


        return view('crpool.service');
    }
    
    public  function project(){


        return view('crpool.project');
    }

    public  function gallery(){

       $gallery = DB::table('gallery')->get();
        $data = array(

            'gallery' => $gallery

        );

        return view('crpool.gallery',$data);
    }
    
 
    public  function   productview($id){

        $product = DB::table('product')
        ->where('id',$id)
        ->first();


        $img = DB::table('product_img')
        ->where('id_product',$id)
        ->get();

        $data = array(

            'product' => $product,
            'img' => $img

        );

        return view('crpool.detailproduct',$data);
    }
    
    
    
}
