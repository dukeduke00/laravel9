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

    Route::controller(ContactController::class)->prefix('/contact')->group(function () {

        Route::post("/send", 'sendContact')->name('sendContact');

        Route::get("/all", 'getAllContacts')->name('sviKontakti');

        Route::get("/delete/{contact}", 'deleteContact')->name('contact.delete');


    });

    Route::controller(ProductController::class)->prefix('/products')->group(function () {

        Route::get("/all", 'getAllProducts')->name('sviProizvodi');

        Route::post("/save", 'addProduct')->name('snimanjeOglasa');

        Route::get("/delete/{product}", 'delete')->name('obrisiProizvod');

        Route::get('/edit/{product}', 'edit')->name('editProizvod');

        Route::post('/save/{product}', 'update')->name('updateProizvod');
    });


    Route::view("/add-product", "addProduct");

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
