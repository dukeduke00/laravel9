<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function getAllProducts()
    {
        $allProducts = ProductModel::all();
        return view("product", compact("allProducts"));
    }



    public function addProduct(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:3|max:25|unique:products",
            "description" => "required|string|min:5|max:100",
            "amount" => "required|integer|min:0",
            "price" => "required|numeric|min:0",
            "image" => "required|string",
        ]);

        ProductModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),
        ]);

        return redirect()->route("sviProizvodi");
    }

    public function delete($product)
    {
        // Select * from products where id = $product LIMIT 1 (first)
        $singleProduct = ProductModel::where(['id' => $product])->first();


        if($singleProduct === null)
        {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    // /admin/product/edit/5 -> ProductsModel::where(['id' => $product])->first()
    public function edit( Request $request, ProductModel $product)
    {

        // Prikazivanje forme s trenutnim podacima proizvoda
        return view('products.editProduct', compact('product'));
    }

    public function update(Request $request, ProductModel $product)
    {
        // Validacija podataka
        $request->validate([
            'name' => 'required|string|min:3|max:25',
            'description' => 'required|string|min:5|max:100',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
        ]);


        /*
        // Radimo update podataka
        $singleProduct->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
        ]);
        */


        // I jedno i drugo ispravno i istu funkciju radi
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');

        $product->save();

        return redirect()->route('sviProizvodi');
    }

}
