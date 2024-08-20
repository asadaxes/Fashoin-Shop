<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware('auth', 'active')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-account', [UserController::class, 'account'])->name('user_account');
    Route::post('/my-account/update-handler', [UserController::class, 'account_update'])->name('user_account_update');
    Route::put('/my-account/security/password-update', [UserController::class, 'account_password_update'])->name('user_account_password_update');
    Route::delete('/my-account/security/account-deletion', [UserController::class, 'account_delete'])->name('user_account_delete');

    Route::get('/shipping-address', [UserController::class, 'shipping_address'])->name('user_shipping_address');
    Route::post('/shipping-address/add', [UserController::class, 'add_shipping_address'])->name('user_add_shipping_address');
    Route::get('/shipping-address/set-default/{id}', [UserController::class, 'set_default_shipping_address'])->name('user_set_default_shipping_address');
    Route::post('/shipping-address/edit', [UserController::class, 'edit_shipping_address'])->name('user_edit_shipping_address');
    Route::get('/shipping-address/delete/{id}', [UserController::class, 'delete_shipping_address'])->name('user_delete_shipping_address');

    Route::get('/order-history', [UserController::class, 'order_history'])->name('user_order_history');

    Route::post('/my-account/updateuserimg', [UserController::class, 'update_profile_img'])->name('user_update_profile_img');
});