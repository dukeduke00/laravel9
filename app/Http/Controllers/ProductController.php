<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

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

    public function delete($product)
    {
        // Select * from products where id = $product LIMIT 1 (first)
        $singleProduct = $this->productRepo->getProductById($product);


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

    public function update(SaveProductRequest $request, ProductModel $product)
    {

        $this->productRepo->updateProduct($product, $request);

        return redirect()->route('sviProizvodi');
    }

}
