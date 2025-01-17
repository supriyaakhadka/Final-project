<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Auth::user()->wishlist()->with('product')->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function store(Request $request)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Product added to wishlist!');
    }

    public function destroy($id)
    {
        Wishlist::where('user_id', Auth::id())->where('product_id', $id)->delete();
        return back()->with('success', 'Product removed from wishlist!');
    }
}
