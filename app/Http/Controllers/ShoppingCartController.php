<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ShoppingCartController extends Controller
{

//    public function index()
//    {
////        $allProducts = [];
////
////        foreach(Session::get('product') as $cartItem)
////        {
////            $allProducts[] = $cartItem['product_id'];
////        }
////
////        // $allProducts = [2, 4, 5]...
////        // SELECT * FROM products WHERE id IN ($allProducts)
////
////        $products = ProductModel::whereIn('id', $allProducts)->get();*/
//
//        $allProducts = array_column(Session::get('product'), 'product_id');
//        $products = ProductModel::whereIn('id', $allProducts)->get();
//
//        return view('cart', [
//            'cart' => Session::get('product'),
//            'products' => $products,
//        ]);
//    }

    public function index()
    {
        // Kombinujemo proizvode i količine u jednu strukturu
        $combined = [];

        foreach (Session::get('product') as $item)
        {

            //Pronadji mi taj proizvod na osnovu ID-a od podataka koje smo izvukli iz baze
            $product = ProductModel::firstWhere('id', $item['product_id']);

            if($product)
            {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $product->price * $item['amount'],
                ];
            }
        }

        return view('cart', ['combinedItems' => $combined]);
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
