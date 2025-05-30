<?php

use App\Http\Controllers\Admin\VariantController;
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
        Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'home'])->name('home');
        Route::prefix('simple')->as('simple.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('list');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            Route::get('/show', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/delete', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete');
        });

        // variants
        Route::prefix('variants')->as('variants.')->group(function () {
            Route::prefix('attributes')->as('attributes.')->group(function () {
                Route::get('', [App\Http\Controllers\Admin\ProductAttributeController::class, 'index'])->name('index');
                Route::get('create', [App\Http\Controllers\Admin\ProductAttributeController::class, 'create'])->name('add');
                Route::post('store', [App\Http\Controllers\Admin\ProductAttributeController::class, 'store'])->name('store');
                Route::get('value/store/{id}', [App\Http\Controllers\Admin\ProductAttributeController::class, 'addValue'])->name('value.store');
                Route::post('value/add', [App\Http\Controllers\Admin\ProductAttributeController::class, 'add'])->name('value.add');
            });
        });
    });
    Route::get('/dh', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
Route::post('/admin/products/variants/generate', [VariantController::class, 'generateVariants'])
    ->name('admin.products.variants.generate');
