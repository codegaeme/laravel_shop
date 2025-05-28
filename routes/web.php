<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->as('admin.')->group(function () {

    // Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('dashboard');
    //danhmuc
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('list-cate');
        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create-cate');
        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store-cate');
        Route::get('/show', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('show-cate');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit-cate');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update-cate');
        Route::delete('/delete', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete-cate');

    });
    //product
        // simple
        Route::prefix('products')->as('products.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('list');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            Route::get('/show', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/delete', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete');
        // variants

    });
});


