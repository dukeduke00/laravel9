<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\HomeRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    private $homeRepo;

    public function __construct()
    {
        $this->homeRepo = new HomeRepository();

    }
    public function index()
    {
        $trenutnoVrijeme = date("h:i:s");
        $sat = date("H");


        $poruka = $sat >= 0 && $sat <= 12
            ? 'Dobro jutro!'
            : 'Dobar dan' ;

        $latestProducts =  $this->homeRepo->sortProducts();




        return view("welcome", compact('trenutnoVrijeme', 'sat', 'poruka', 'latestProducts'));
    }


}
