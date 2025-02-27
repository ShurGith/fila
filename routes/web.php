<?php
    
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\FavoriteController;
    use App\Http\Controllers\HomeControler;
    use App\Http\Controllers\LanguageController;
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Route;
    
    Route::get('/', [HomeControler::class, 'home'])->name('home');
    
    Route::get('/buyit/{product}', [ProductController::class, 'buyit'])->name('product.buyit');
    Route::resource('products', ProductController::class);
    Route::resource('blog', BlogController::class);
    Route::get('/lang/{lang}', [LanguageController::class, 'switch'])->name('lang');
    
    Route::resource('products', ProductController::class);
    
    Route::post('/favorites/toggle/{id}', [FavoriteController::class, 'toggle']);
    Route::get('/favorites', [FavoriteController::class, 'getFavorites'])->name('favorites');

