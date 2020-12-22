<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    public function index()
    {
        $shoppingcartItems = \Cart::session(auth()->id())->getContent();
        return view('shoppingcart.index', compact('shoppingcartItems'));
    }

    public function add(Product $product)
    {
        // dd($product);
        //Adding product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->back();
    }
    public function destroy($itemId){
        \Cart::session(auth()->id())->remove($itemId);
        return redirect()->back();
        //return view('shoppingcart.index', compact('shoppingcartItems'));
    }
    public function update(){

    }
}
