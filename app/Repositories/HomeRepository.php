<?php

namespace App\Repositories;

use App\Models\ContactModel;
use App\Models\ProductModel;

class HomeRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function sortProducts()
    {
       return $this->productModel->orderBy('id', 'desc')->take(4)->get();
    }
}
