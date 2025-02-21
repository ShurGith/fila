<?php
    
    use App\Http\Controllers\HomeControler;
    use Illuminate\Support\Facades\Route;
    
    Route::get('/', [HomeControler::class, 'home'])->name('home');
    
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('blog', App\Http\Controllers\BlogController::class);
