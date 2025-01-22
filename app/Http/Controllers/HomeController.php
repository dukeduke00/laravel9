<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\HomeRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new HomeRepository();

    }
    public function index()
    {
        $trenutnoVrijeme = date("h:i:s");
        $sat = date("H");


        $poruka = $sat >= 0 && $sat <= 12
            ? 'Dobro jutro!'
            : 'Dobar dan' ;

        $latestProducts =  $this->productRepo->sortProducts();

        return view("welcome", compact('trenutnoVrijeme', 'sat', 'poruka', 'latestProducts'));
    }


}
