<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/add-produits', [ProduitController::class, 'addProduits'])->name('produits.add');
Route::get('/getPrix/{id}', [ProduitController::class, 'getPrices'])->name('produits.prices');;
