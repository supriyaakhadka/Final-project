<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data=$request->validate([
'product_id'=>'required',
'quantity'=>'required|integer'
        ]);
        $data['user_id']=auth()->user()->id;
        $check=Cart::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->count();
        if($check>0){
            return back()->with('error','Product Already in cart');
        }
        Cart::create($data);
        return back()->with('success','Product Added to Cart Successfully');
    }

    public function mycart ()
    {
        $carts=Cart::where('user_id',auth()->user()->id)->get();

        return view('cart',compact('carts'));
    }
    public function destroy(Request $request)
    {
        Cart::find($request->dataid)->delete();
        return back()->with('success','Product Removed successfully');
    }
    public function checkout($id)
    {
        $cart=Cart::find($id);
    if($cart->user_id!=auth()->user()->id){
    return back()->with('error','Unauthorized Access');
}
return view('checkout',compact('cart'));
    }

    }

