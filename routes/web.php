<?php

use App\Http\Controllers\CiteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\deuxiemeController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\qrcodeController;
use App\Http\Controllers\statistiqueController;
use App\Http\Controllers\VenteController;
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

Route::get('/clients',[ClientController::class,'index']);
Route::get('/clientsEndette',[ClientController::class,'dette']);
Route::get('/client-create',[ClientController::class,'create']);
Route::post('/client-store',[ClientController::class,'store']);
Route::get('/client-edit/{id}',[ClientController::class,'edit']);
Route::put('/client-update/{id}',[ClientController::class,'update']);
Route::get('/client-delete/{id}',[ClientController::class,'destroy']);
//Route::get('/client-delete/{id}',[ClientController::class,'getspec']);

Route::get('/citesListe',[CiteController::class,'index']);
Route::get('/cite-create',[CiteController::class,'create']);
Route::post('/cite-ajout',[CiteController::class,'ajout']);
Route::get('/cite-edit/{id}',[CiteController::class,'edit']);
Route::put('/cite-update/{id}',[CiteController::class,'update']);
Route::get('/cite-delete/{id}',[CiteController::class,'supprimer']);

Route::get('/logementsListe',[LogementController::class,'index']);
Route::get('/logementsIndispoListe',[LogementController::class,'indispo']);
Route::get('/logement-create',[LogementController::class,'create']);
Route::post('/logement-ajout',[LogementController::class,'ajout']);
Route::get('/logement-edit/{id}',[LogementController::class,'edit']);
Route::put('/logement-update/{id}',[LogementController::class,'update']);
Route::get('/logement-delete/{id}',[LogementController::class,'supprimer']);

Route::get('/VenteListe',[VenteController::class,'index']);
Route::get('/vente-create',[VenteController::class,'create']);
Route::post('/vente-store',[VenteController::class,'store']);
Route::get('/vente-edit/{id}',[VenteController::class,'edit']);
Route::put('/vente-update/{id}',[VenteController::class,'update']);
Route::get('/vente-delete/{id}',[VenteController::class,'destroy']);

Route::get('/deuxiemeListe',[deuxiemeController::class,'index']);
Route::get('/deuxieme_create',[deuxiemeController::class,'create']);
Route::post('/deuxieme-store',[deuxiemeController::class,'store']);


Route::get('/dashboard',[dashboardController::class,'index']);

Route::get('/facturationVente',[factureController::class,'index']);
Route::post('/facture-vente',[factureController::class,'facture']);

Route::get('/facturationDeuxieme',[factureController::class,'deuxieme']);
Route::post('/facture-deuxieme',[factureController::class,'factureDeuxieme']);

Route::get('/statistique-logement',[statistiqueController::class,'stat']);


Route::get('/',[loginController::class,'index']);
Route::post('/se-connecter',[loginController::class,'login']);
