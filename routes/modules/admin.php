<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Generals;
use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Admin\Categories;
use App\Http\Controllers\Admin\SubCategories;
use App\Http\Controllers\Admin\ProductsInventory;
use App\Http\Controllers\Admin\SizeGuidesBook;


Route::middleware('auth', 'verified', 'active', 'admin')->group(function () {
    Route::get('/admin/dashboard', [Generals::class, 'dashboard'])->name('admin_dashboard');

    Route::get('/admin/users/list', [Users::class, 'users_list'])->name('admin_users_list');
    Route::get('/admin/users/add', [Users::class, 'users_add'])->name('admin_users_add');
    Route::post('/admin/users/add/handler', [Users::class, 'users_add_handler'])->name('admin_users_add_handler');
    Route::get('/admin/users/view', [Users::class, 'users_view'])->name('admin_users_view');
    Route::post('/admin/users/view/handler', [Users::class, 'users_view_handler'])->name('admin_users_view_handler');
    Route::post('/admin/users/delete/account', [Users::class, 'users_delete_account'])->name('admin_users_delete_account');

    Route::get('/admin/category/list', [Categories::class, 'list'])->name('admin_category_list');
    Route::post('/admin/category/add', [Categories::class, 'add'])->name('admin_category_add');
    Route::post('/admin/category/edit/handler', [Categories::class, 'edit'])->name('admin_category_edit');
    Route::post('/admin/category/remove/handler', [Categories::class, 'delete'])->name('admin_category_delete');

    Route::get('/admin/sub-category/list', [SubCategories::class, 'list'])->name('admin_sub_category_list');
    Route::post('/admin/sub-category/add', [SubCategories::class, 'add'])->name('admin_sub_category_add');
    Route::post('/admin/sub-category/edit/handler', [SubCategories::class, 'edit'])->name('admin_sub_category_edit');
    Route::post('/admin/sub-category/remove/handler', [SubCategories::class, 'delete'])->name('admin_sub_category_delete');

    Route::get('/admin/products/list', [ProductsInventory::class, 'products_list'])->name('admin_products_list');
    Route::get('/admin/products/add', [ProductsInventory::class, 'products_add'])->name('admin_products_add');
    Route::post('/admin/products/add/handler', [ProductsInventory::class, 'products_add_handler'])->name('admin_products_add_handler');
    Route::get('/admin/products/edit', [ProductsInventory::class, 'products_edit'])->name('admin_products_edit');
    Route::post('/admin/products/edit/handler', [ProductsInventory::class, 'products_edit_handler'])->name('admin_products_edit_handler');
    Route::post('/admin/products/delete', [ProductsInventory::class, 'products_delete'])->name('admin_products_delete');

    Route::get('/admin/size-guides/list', [SizeGuidesBook::class, 'list'])->name('admin_size_guides_list');
    Route::post('/admin/size-guides/add', [SizeGuidesBook::class, 'add'])->name('admin_size_guides_add');
    Route::post('/admin/size-guides/edit', [SizeGuidesBook::class, 'edit'])->name('admin_size_guides_edit');
    Route::post('/admin/size-guides/delete', [SizeGuidesBook::class, 'delete'])->name('admin_size_guides_delete');
});