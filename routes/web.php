<?php

use App\Http\Controllers\ProfileController;
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

Route::get("/", [\App\Http\Controllers\HomeController::class,"index"]);

Route::get("/shop", [\App\Http\Controllers\ShopController::class, "getAllProducts"]);

Route::get("/contact", [\App\Http\Controllers\ContactController::class, "index"]);

Route::view("/about", "about");

Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, "sendContact"]);

Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactController::class, "getAllContacts"])
    ->name("sviKontakti");

Route::get("/admin/all-products", [\App\Http\Controllers\ProductController::class, "getAllProducts"])
    ->name("sviProizvodi");

Route::view("/admin/add-product", "addProduct");

Route::post("admin/save-product", [\App\Http\Controllers\ProductController::class, "addProduct"])
    ->name("snimanjeOglasa");

Route::get("/admin/delete-product/{product}", [\App\Http\Controllers\ProductController::class, "delete"])
    ->name("obrisiProizvod");


Route::get("/admin/delete-contact/{contact}", [\App\Http\Controllers\ContactController::class, "deleteContact"])
    ->name("obrisiKontakt");


Route::get('/admin/product/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])
    ->name('editProizvod');

Route::post('/admin/product/save/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('updateProizvod');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
