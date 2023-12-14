<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//---------------------------------------------------------------------------------------

Route::resource('/categorie','CategorieController');
Route::resource('/client','ClientController');
Route::resource('/produit','ProduitController');
// Route::resource('/produit', 'ProduitController', ['names' => 'p']);
Route::resource('/fornisseur','FornisseurController');
Route::resource('/commande','CommandeController');
Route::resource('/commandeprod','CommandeprodController');
Route::resource('/approvisionnement','ApprovisionnementController');
Route::resource('/approproduit','ApproproduitController');
// Route::get('/abdo',function(){
//     return 'salam si Abderrahmane';
// });
Route::get('/', function () {
    return redirect('/produit');
});
// Route::post('/approproduit/{id}','ApproproduitController@createe')->name('approproduit.createe');




//---------------------------------------------------------------------------------------