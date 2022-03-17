<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TypePermissionController;
use App\Http\Controllers\Ajax\AjaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'type-permissions'  => TypePermissionController::class,
        'permissions'       => PermissionController::class,
        'users'             => UserController::class,
        'categories'        => CategoryController::class,
        'menus'             => MenuController::class,
    ]);
    Route::get('/categories/create/{lang}/{category_id}', [CategoryController::class, 'createLanguage'])->name('categories-create.lang');
    Route::get('/menus/create/{lang}/{menu_id}', [MenuController::class, 'createLanguage'])->name('menus-create.lang');
    //Phân quyền cho nhân viên
    Route::get('/role/authorization/{user_id}', [RoleController::class, 'authorization'])->name('authorization-user');
    Route::post('/role/authorization-post', [RoleController::class, 'authorizationPost'])->name('authorization-user-post');
    Route::get('/role/authorization-update/{user_id}/{role_id}', [RoleController::class, 'authorizationUpdate'])->name('authorization-user-role');
    Route::post('/role/authorization-update-post', [RoleController::class, 'authorizationUpdatePost'])->name('authorization-user-role-update-post');
    //Ajax
    Route::post('enable-column', [AjaxController::class, 'enableColumn'])->name('enable-column');

    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');
});
require __DIR__.'/auth.php';
