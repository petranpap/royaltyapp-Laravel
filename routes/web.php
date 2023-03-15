<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Clients
Route::get('/clients', [App\Http\Controllers\ClientsController::class, 'index'])->name('clients');
Route::get('/clients/lifetime_points', [App\Http\Controllers\ClientsController::class, 'index_lifetime'])->name('lifetime_points');
Route::get('/clients/new', function () {return view('clients.new');});
Route::get('/clients/search', function () {return view('clients.search');});
Route::post('/clients_search', [App\Http\Controllers\ClientsController::class, 'search']);

Route::get('/clients/edit/{id}', [App\Http\Controllers\ClientsController::class, 'edit']);
Route::post('/clients/delete/{id}', [ClientsController::class, 'delete']);
Route::post('/clients/add/{authid}', [App\Http\Controllers\ClientsController::class, 'store']);
Route::put('update-client/{id}/{authid}', [App\Http\Controllers\ClientsController::class, 'update']);
Route::put('redeem-client/{id}/{authid}', [App\Http\Controllers\ClientsController::class, 'redeem']);

//Transactions
Route::get('/trans', [App\Http\Controllers\TransController::class, 'index'])->name('trans');


//Cashiers
Route::get('/cashiers', [App\Http\Controllers\CashiersController::class, 'index'])->name('cashiers');
Route::post('/cashiers/delete/{id}', [App\Http\Controllers\CashiersController::class, 'delete']);
Route::get('/cashiers/edit/{id}', [App\Http\Controllers\CashiersController::class, 'edit']);
Route::put('update-cashier/{id}', [App\Http\Controllers\CashiersController::class, 'update']);
