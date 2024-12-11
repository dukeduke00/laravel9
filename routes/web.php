<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [HomeController::class,"index"]);

Route::get("/shop", [ShopController::class, "getAllProducts"]);

Route::get("/contact", [ContactController::class, "index"]);

Route::view("/about", "about");

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {

    Route::post("/send-contact", [ContactController::class, "sendContact"]);

    Route::get("/all-contacts", [ContactController::class, "getAllContacts"])
        ->name("sviKontakti");

    Route::get("/all-products", [ProductController::class, "getAllProducts"])
        ->name("sviProizvodi");

    Route::view("/add-product", "addProduct");

    Route::post("/save-product", [ProductController::class, "addProduct"])
        ->name("snimanjeOglasa");

    Route::get("/delete-product/{product}", [ProductController::class, "delete"])
        ->name("obrisiProizvod");


    Route::get("/delete-contact/{contact}", [ContactController::class, "deleteContact"])
        ->name("obrisiKontakt");


    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])
        ->name('editProizvod');

    Route::post('/product/save/{product}', [ProductController::class, 'update'])
        ->name('updateProizvod');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
