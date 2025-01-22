<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository
{
    // DI - Dependency Injection
    // Imamo stalno pristup ProductModel

    private $productModel;

    public function __construct()
    {
       $this->productModel = new ProductModel();
    }

    public function createNew($request)
    {
        $this->productModel->create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),
        ]);
    }

    public function getProductById($id)
    {
        // Select * from products where id = $product LIMIT 1 (first)

         return $this->productModel->where(['id' => $id])->first();


    }

    public function updateProduct($product, $request)
    {

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');

        $product->save();
    }

}
