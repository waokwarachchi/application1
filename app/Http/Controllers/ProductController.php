<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function insert(Request $req){
       $name= $req->get('pname');
       $price= $req->get('pprice');
       $status=$req->get('pstatus');
       $image=$req->file('pimage')->getClientOriginalName();
       //move uploaded file
       $req->pimage->move(public_path('images'),$image);

       $prod=new Product();
       $prod->PName=$name;
       $prod->PPrice=$price;
       $prod->PStatus=$status;
       $prod->PImage=$image;
       $prod->save();
       return redirect('/');

    }
    function readdata(){
        $pdata=Product::all();
        return view('insertRead',['data'=>$pdata]);
    }
    function updateordelete(Request $req){
         $id=$req->get('id');
         $name=$req->get('name');
         $price=$req->get('price');
         $status=$req->get('status');
         if($req->get('update')=='Update'){
            return view('updateView',['pid'=>$id,'pname'=>$name,'pprice'=>$price,'pstatus'=>$status]);
         }
         else{
         $prod=Product::find($id);
         $prod->delete();
         }
         return redirect('/');
    }
    function update(Request $req){
        $ID=$req->get('id');
        $Name=$req->get('name');
        $Price=$req->get('price');
        $Status=$req->get('status');
        $prod=Product::find($ID);
        $prod->PName=$Name;
        $prod->PPrice=$Price;
        $prod->PStatus=$Status;
        $prod->save();
        return redirect('/');
    }
}
