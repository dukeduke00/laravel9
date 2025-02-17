<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        return view('Product');
    }

    public function getAllProducts()
    {
        $allProducts = ProductModel::all();
        return view('shop', compact("allProducts"));
    }
}
