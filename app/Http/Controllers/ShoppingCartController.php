<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ShoppingCartController extends Controller
{

    public function index()
    {
//        $allProducts = [];
//
//        foreach(Session::get('product') as $cartItem)
//        {
//            $allProducts[] = $cartItem['product_id'];
//        }
//
//        // $allProducts = [2, 4, 5]...
//        // SELECT * FROM products WHERE id IN ($allProducts)
//
//        $products = ProductModel::whereIn('id', $allProducts)->get();*/

        $allProducts = array_column(Session::get('product'), 'product_id');
        $products = ProductModel::whereIn('id', $allProducts)->get();

        return view('cart', [
            'cart' => Session::get('product'),
            'products' => $products,
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {
        $product = ProductModel::where(['id' => $request->id])->first();

        if($product->amount < $request->amount)
        {
            return redirect()->back();
        }

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount,

        ]);

        return redirect()->route('cart.all');
    }
}
