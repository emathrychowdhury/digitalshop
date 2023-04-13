<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backendThemeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontendTheme.index');
});
//Route::resource('products/details/{id}',ProductController::class,'ProductDetails');

Route::resource('sliders',SliderController::class);

Route::middleware('auth')->group(function (){
Route::resource('products',ProductController::class);
Route::get('product/inactive/{id}',[ProductController::class,
    'ProductInactive'])->name('product.inactive');
Route::get('product/active/{id}',[ProductController::class,
        'ProductActive'])->name('product.active');
});
//Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    Route::get('/backendTheme/layout', [backendThemeController::class, 'destroy'])
        ->name('backendTheme.layout');

});
Route::get('/dashboard', function () {
    return view('backendTheme.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
