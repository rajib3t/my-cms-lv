<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminResetPasswordController;
use App\Http\Controllers\Admin\Auth\AdminForgetPasswordController;
use App\Http\Controllers\Admin\Auth\AdminConfirmPasswordController;

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
    Route::post('logout',[AdminLoginController::class,'logout'])
    ->name('logout');
    Route::group(['middleware'=> ['auth:admin']],function () {
        Route::get('/',[AdminController::class,'dashboard'])
        ->name('dashboard');
         /**
         * Confirm Password
         */
        Route::get('/confirm-password',[AdminConfirmPasswordController::class,'confirmPassword'])
        ->name('password.confirm');
        Route::post('/confirm-password',[AdminConfirmPasswordController::class,'confirmPasswordAuthenticate'])
        ->name('password.confirm.auth')
        ->middleware('throttle:6,1');
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
            Route::get('/add-permission/{id}','add_permission')
            ->name('add_permission')->middleware(['role:Super Admin','permission:role.add_permission']);
            Route::post('/store-permission/{id}','store_permission')
            ->name('store_permission')->middleware(['role:Super Admin','permission:role.store_permission']);
            Route::get('/remove-permission/{id}/{permission_id}','remove_permission')
            ->name('remove_permission')->middleware(['role:Super Admin','permission:role.remove_permission']);
            Route::get('/add-single-permissiob/{id}/{permission_id}','add_single_permission')
            ->name('add_single_permission')->middleware(['role:Super Admin','permission:role.add_single_permission']);
        });
        /**
         * Permissions
         * Add,List,Edit,Add Roles to Permissions
         */
        Route::group([
            'as'=>'permission.',
            'prefix'=>'permissions',
            'controller'=>PermissionController::class
        ],function(){
            Route::get('/','index')
            ->name('list')->middleware(['role:Super Admin','permission:permission.list']);
            Route::get('/create','create')
            ->name('create')->middleware(['role:Super Admin','permission:permission.create']);
            Route::post('/store','store')
            ->name('store')->middleware(['role:Super Admin','permission:permission.store']);
            Route::get('/edit/{id}','edit')
            ->name('edit')->middleware(['role:Super Admin','permission:permission.edit']);
            Route::post('/update/{id}','update')
            ->name('update')->middleware(['role:Super Admin','permission:permission.update']);
            Route::get('/delete/{id}','destroy')
            ->name('delete')->middleware(['role:Super Admin','permission:permission.delete']);
            Route::get('/add-role/{id}','add_role')
            ->name('add_role')->middleware(['role:Super Admin','permission:permission.add_role']);
            Route::post('/store-role/{id}','store_role')
            ->name('store_role')->middleware(['role:Super Admin','permission:permission.store_role']);
            Route::get('/remove-role/{id}/{role_id}','remove_role')
            ->name('remove_role')->middleware(['role:Super Admin','permission:permission.remove_role']);
            Route::get('/add-single-role/{id}/{role_id}','add_single_role')
            ->name('add_single_role')->middleware(['role:Super Admin','permission:permission.add_single_role']);
        });
        /**
         * Users admin
         * Add,List,Edit,Add Roles to Users
         */
        Route::group([
            'as'=>'user.admin.',
            'prefix'=>'users/admins',
            'controller'=>AdminUserController::class,
        ],function(){
            Route::get('/','index')
            ->name('list')->middleware(['role:Super Admin','permission:user.admin.list']);
            Route::get('/create','create')
            ->name('create')->middleware(['role:Super Admin','permission:user.admin.create']);
            Route::post('/store','store')
            ->name('store')->middleware(['role:Super Admin','permission:user.admin.store']);
            Route::get('/edit/{id}','edit')
            ->name('edit')->middleware(['role:Super Admin','permission:user.admin.edit']);
            Route::post('/update/{id}','update')
            ->name('update')->middleware(['role:Super Admin','permission:user.admin.update']);
            Route::get('/password-change/{id}','password_change')
            ->name('password.change')->middleware(['role:Super Admin','permission:user.admin.password.change']);
            Route::post('/password-update/{id}','password_update')
            ->name('password.update')->middleware(['role:Super Admin','permission:user.admin.password.update']);
            Route::get('/delete/{id}','destroy')
            ->name('delete')->middleware(['role:Super Admin','permission:user.admin.delete']);
            Route::get('trash','trash')
            ->name('trash')->middleware(['role:Super Admin','permission:user.admin.trash']);
            Route::get('/restore/{id}','restore')
            ->name('restore')->middleware(['role:Super Admin','permission:user.admin.restore']);
        });

        /**
         * Logged in user profile
         * Add,List,Edit,Add Roles to Users
         */
        Route::group([
            'as'=>'user.admin.',
            'prefix'=>'users/admin/',
            'controller'=>ProfileController::class,
        ],function(){
            Route::get('/profile','profile')
            ->name('profile')->middleware(['password.confirm:admin.password.confirm']);
            Route::post('/profile-update/{id}','profile_update')
            ->name('profile.update')->middleware(['password.confirm:admin.password.confirm']);
            Route::get('/profile/password-change','change_password')
            ->name('profile.password.change')->middleware(['password.confirm:admin.password.confirm']);
            Route::post('/profile/password-update','update_password')
            ->name('profile.password.update')->middleware(['password.confirm:admin.password.confirm']);
        });
    });
});
