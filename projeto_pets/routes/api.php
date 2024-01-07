<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\VaccineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('people', [PeopleController::class, 'index']);
Route::post('people', [PeopleController::class, 'store']);
Route::put('people/{id}', [PeopleController::class, 'update']);
Route::get('people/{id}', [PeopleController::class, 'show']);
Route::delete('people/{id}', [PeopleController::class, 'destroy']);

Route::get('clients', [ClientController::class, 'index']);
Route::post('clients', [ClientController::class, 'store']);

Route::get('professionals', [ProfessionalController::class, 'index']);
Route::post('professionals', [ProfessionalController::class, 'store']);
Route::put('professionals/{id}', [ProfessionalController::class, 'update']);
Route::get('professionals/{id}', [ProfessionalController::class, 'show']);
Route::delete('professionals/{id}', [ProfessionalController::class, 'destroy']);

Route::get('races', [RaceController::class, 'index']);
Route::post('races', [RaceController::class, 'store']);
Route::put('races/{id}', [RaceController::class, 'update']);
Route::get('races/{id}', [RaceController::class, 'show']);
Route::delete('races/{id}', [RaceController::class, 'destroy']);

Route::get('species', [SpecieController::class, 'index']);
Route::post('species', [SpecieController::class, 'store']);
Route::put('species/{id}', [SpecieController::class, 'update']);
Route::get('species/{id}', [SpecieController::class, 'show']);
Route::delete('species/{id}', [SpecieController::class, 'destroy']);

Route::get('pets', [PetsController::class, 'index']);
Route::post('pets', [PetsController::class, 'store']);
Route::put('pets/{id}', [PetsController::class, 'update']);
Route::get('pets/{id}', [PetsController::class, 'show']);
Route::delete('pets/{id}', [PetsController::class, 'destroy']);

Route::get('vaccines', [VaccineController::class, 'index']);
Route::post('vaccines', [VaccineController::class, 'store']);
Route::put('vaccines/{id}', [VaccineController::class, 'update']);
Route::get('vaccines/{id}', [VaccineController::class, 'show']);
Route::delete('vaccines/{id}', [VaccineController::class, 'destroy']);
