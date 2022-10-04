<?php

use App\Http\Controllers\Admin\{
    CategoryController,
    DashboardController,
    SubcategoryController
};
use App\Http\Livewire\CategoryComponent;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class, 'index'])->name('admin.index');

Route::resource('categorias', CategoryController::class )->names('admin.categories');

Route::resource('Subcategorias', SubcategoryController::class)->names('admin.subcategories');