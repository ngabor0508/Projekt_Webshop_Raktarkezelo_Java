<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermekekController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
/*Route::get('/', [ HomeController::class, 'index' ])->name('home');

//Route::resource('termekek', TermekekController::class);
*/
Auth::routes(['verify' => true]);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [TermekekController::class, 'index']);    
Route::get('index', [TermekekController::class, 'index'])->name('index');    
Route::get('cart', [TermekekController::class, 'cart'])->name('cart');
Route::get('rolunk', [TermekekController::class, 'rolunk'])->name('rolunk');
Route::get('kapcsolat', [TermekekController::class, 'kapcsolat'])->name('kapcsolat');
Route::get('adatvedelem', [TermekekController::class, 'adatvedelem'])->name('adatvedelem');
Route::get('aszf', [TermekekController::class, 'aszf'])->name('aszf');
Route::get('szallitas', [TermekekController::class, 'szallitas'])->name('szallitas');
Route::get('rendeles', [TermekekController::class, 'rendeles'])->name('rendeles');
Route::get('termekek', [TermekekController::class, 'termekek'])->name('termekek');
Route::get('kesz_termekek', [TermekekController::class, 'kesz_termekek'])->name('kesz_termekek');
Route::get('alapanyagok', [TermekekController::class, 'alapanyagok'])->name('alapanyagok');
Route::get('dekoraciok', [TermekekController::class, 'dekoraciok'])->name('dekoraciok');
Route::get('rendezes_novekvo_dekor', [TermekekController::class, 'rendezes_novekvo_dekor'])->name('rendezes_novekvo_dekor');
Route::get('rendezes_csokkeno_dekor', [TermekekController::class, 'rendezes_csokkeno_dekor'])->name('rendezes_csokkeno_dekor');
Route::get('rendezes_novekvo_alap', [TermekekController::class, 'rendezes_novekvo_alap'])->name('rendezes_novekvo_alap');
Route::get('rendezes_csokkeno_alap', [TermekekController::class, 'rendezes_csokkeno_alap'])->name('rendezes_csokkeno_alap');
Route::get('rendezes_novekvo_kesz', [TermekekController::class, 'rendezes_novekvo_kesz'])->name('rendezes_novekvo_kesz');
Route::get('rendezes_csokkeno_kesz', [TermekekController::class, 'rendezes_csokkeno_kesz'])->name('rendezes_csokkeno_kesz');
//Route::get('rendezes_novekvo_szurt', [TermekekController::class, 'rendezes_novekvo_szurt'])->name('rendezes_novekvo_szurt');
//Route::get('rendezes_csokkeno_szurt', [TermekekController::class, 'rendezes_csokkeno_szurt'])->name('rendezes_csokkeno_szurt');
Route::get('add-to-cart/{id}', [TermekekController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [TermekekController::class, 'update_termek'])->name('update.cart');
Route::delete('remove-from-cart', [TermekekController::class, 'remove'])->name('remove.from.cart');
Route::get('termekek/search', [TermekekController::class, 'search'])->name('web.search');
Route::get('termekek/szures_dekor', [TermekekController::class, 'szures_dekor'])->name('szures_dekor');
Route::get('termekek/szures_alap', [TermekekController::class, 'szures_alap'])->name('szures_alap');
Route::get('termekek/szures_kesz', [TermekekController::class, 'szures_kesz'])->name('szures_kesz');

require __DIR__.'/auth.php';




