<?php
    
    use Illuminate\Support\Facades\Route;
    
    Route::get('/', function () {
        return view('home')->name('hone');
    });
    
    
    Route::resource('products', App\Http\Controllers\ProductController::class);