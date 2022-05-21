<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminResetPasswordController;
use App\Http\Controllers\Admin\Auth\AdminForgetPasswordController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['as' => 'admin.'],  function() {
    Route::get('/login',[AdminLoginController::class,'showLogin'])
    ->name('login');
    Route::post('/authenticate',[AdminLoginController::class,'authenticate'])
    ->name('authenticate');
    Route::get('/forgot-password',[AdminForgetPasswordController::class,'showLinkRequestForm'])
    ->name('forget.password');
    Route::post('/forgot-password',[AdminForgetPasswordController::class,'sendResetLinkEmail'])
    ->name('password.email');
    Route::get('/password/reset/{token}',[AdminResetPasswordController::class,'showResetForm'])
    ->name('password.reset');
    Route::post('/reset-password',[AdminResetPasswordController::class,'reset'])
    ->name('password.update');
    Route::group(['middleware'=> ['auth:admin']],function () {
        Route::get('/',[AdminController::class,'dashboard'])
        ->name('dashboard');

        /**
         * ACL
         * Included Roles, Permission and ACL Setting
         */
        /**
         * Roles
         * Add,List,Edit,Add Permissions to Roles
         */
        Route::group([
            'as'=>'role.',
            'prefix'=>'roles',
            'controller'=>RoleController::class
        ],function(){
            Route::get('/','index')
            ->name('list')->middleware(['role:Super Admin','permission:role.list']);
            Route::get('/create','create')
            ->name('create')->middleware(['role:Super Admin','permission:role.create']);
            Route::post('/store','store')
            ->name('store')->middleware(['role:Super Admin','permission:role.store']);
            Route::get('/edit/{id}','edit')
            ->name('edit')->middleware(['role:Super Admin','permission:role.edit']);
            Route::post('/update/{id}','update')
            ->name('update')->middleware(['role:Super Admin','permission:role.update']);
            Route::get('/delete/{id}','destroy')
            ->name('delete')->middleware(['role:Super Admin','permission:role.delete']);
        });
    });
});
