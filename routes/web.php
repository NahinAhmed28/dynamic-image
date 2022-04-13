<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  ImageController,
};
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
    return redirect('/dashboard');
})->middleware(['auth'])->name('welcome');


Route::middleware(['auth'])->group(function () {
  // dashboard start
//  Route::get('/dashboard', function () {
//      return view('dashboard');
//  })->name('dashboard');

    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
  // dashboard end

 Route::post('/image/store/', [ImageController::class, 'store'])->name('image.store');
 Route::get('/image/delete/{id}', [ImageController::class, 'delete'])->name('image.delete');


});

Route::get('/logout', function () {
  Auth::logout();
  return redirect()->route('login')->with('success', 'Successfully Logged Out.');
})->name('logout');

require __DIR__.'/auth.php';
