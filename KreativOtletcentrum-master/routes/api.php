<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TermekekController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('termekek', TermekekController::class);

/*
Route::post('ujtermek',[TermekekController::class, 'create'])->name('ujtermek'); ;   //uj termek felvetele
Route::get('termek/{id}',[TermekekController::class, 'update']); //termek frissitese
Route::post('termek/{id}',[TermekekController::class, 'remove'])->name('termektorlese');  // termek torlese
Route::get('termekek',[TermekekController::class, 'index'])->name('termekek'); // osszes termek
*/