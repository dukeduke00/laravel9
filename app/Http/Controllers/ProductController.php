<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();

    }


    public function getAllProducts()
    {
        $allProducts = ProductModel::all();
        return view("product", compact("allProducts"));
    }



    public function addProduct(SaveProductRequest $request)
    {

        $this->productRepo->createNew($request);

        return redirect()->route("sviProizvodi");
    }

    public function delete(ProductModel $product)
    {

        $product->delete();

        return redirect()->back();
    }

    // /admin/product/edit/5 -> ProductsModel::where(['id' => $product])->first()
    public function edit(ProductModel $product)
    {

        // Prikazivanje forme s trenutnim podacima proizvoda
        return view('products.editProduct', compact('product'));
    }

    public function update(SaveProductRequest $request, ProductModel $product)
    {

        $this->productRepo->updateProduct($product, $request);

        return redirect()->route('sviProizvodi');
    }

}
