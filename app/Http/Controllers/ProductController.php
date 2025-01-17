<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      $products=product::all();
      return view('product.index',compact('products'));

    }

    public function create()
    {

       $categories=category::orderBy('priority')->get();
       return view('product.create',compact('categories'));

    }
    public function store(Request $request)
    {
       $data= $request->validate([

        'name'=>'required|string',
        'price'=>'required',
        'stock'=>'required',
        'description'=>'required|string',
        'photopath'=>'required|image',
        'category_id'=>'required',

       ]);
       $photoname=time().'.'.$request->photopath->extension();
       $request->photopath->move(public_path('image'),$photoname);
       $data['photopath']=$photoname;
       product::create($data);
       return redirect()->route('products.index')->with('success','product created sucecessfully');

    }
    public function edit($id)
    {
      $categories=category::orderBy('priority')->get();
      $product=product::find($id);
      return view('product.edit',compact('product','categories',));
    }

    public function update(Request $request,$id)
    {

      $data= $request->validate([

        'name'=>'required|string',
        'price'=>'required',
        'stock'=>'required',
        'description'=>'required|string',
        'brand_id'=>'required',
        'category_id'=>'required',
      ]);
      $products= Product::find($id);
      if($request->hasFile('photopath'))
      {
      $photoname=time().'.'.$request->photopath->extension();
      $request->photopath->move(public_path('image'),$photoname);
      $data['photopath']=$photoname;
       $oldphoto=public_path('image').'/'.$products->photopath;
       if (file_exists($oldphoto))
       {
        unlink($oldphoto);
       }
    }
      $products->update($data);

      return redirect()->route('products.index')->with('success','product update  sucecessfully');

    }
    public function destroy($id)
  {

    $products=Product::find($id);
    $photo =public_path('image').'/'.$products->photopath;
    if(file_exists($photo))
    {
        unlink($photo);
    }
    $products->delete();
    return redirect()->route('products.index')->with('success','product delete sucecessfully');
  }



}
