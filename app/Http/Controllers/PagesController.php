<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function home()
   {
    $products=Product::latest()->get();
    return view('welcome',compact('products'));
   }
   public function about()
   {
    return view('about');
   }
   public function contact()
   {
    return view('contact');
   }
   public function varity()
   {
    return view('variety');
   }
   public function categoryproduct($id)
   {
    $category=category::find($id);
    $products=product::where('category_id',$id)->get();
    return view ('categoryproduct',compact('products','category'));
   }
   public function viewproduct($id)
   {
    $product=Product::find($id);
    $relatedproducts=Product::where('category_id',$product->category_id)->where('id','!=',$id)->limit(4)->get();
    return view ('viewsproduct',compact('product','relatedproducts'));
   }
   public function search(Request $request)
   {
    $qry=$request->qry;
    $products=Product::where('name','like','%'.$qry.'%')->get();
    return view('search',compact('products','qry'));

   }

}
