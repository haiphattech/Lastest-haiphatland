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
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusProjectController;
use App\Http\Controllers\TypeProjectController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AboutUController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\IntroduceDetailController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ContactController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/thay-doi-mat-khau',[HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword',[HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::resources([
        'type-permissions'  => TypePermissionController::class,
        'permissions'       => PermissionController::class,
        'users'             => UserController::class,
        'categories'        => CategoryController::class,
        'menus'             => MenuController::class,
        'projects'          => ProjectController::class,
        'status-projects'   => StatusProjectController::class,
        'type-projects'     => TypeProjectController::class,
        'investors'         => InvestorController::class,
        'activities'        => ActivityController::class,
        'events'            => EventController::class,
        'applications'      => ApplicationController::class,
        'aboutUs'           => AboutUController::class,
        'news'              => NewsController::class,
        'journals'          => JournalController::class,
        'systems'           => SystemController::class,
        'recruits'          => RecruitController::class,
        'introduces'        => IntroduceController::class,
        'candidates'        => CandidateController::class,
        'contacts'          => ContactController::class,
    ]);
    Route::get('/categories/create/{lang}/{category_id}', [CategoryController::class, 'createLanguage'])->name('categories-create.lang');
    Route::get('/menus/create/{lang}/{menu_id}', [MenuController::class, 'createLanguage'])->name('menus-create.lang');
    Route::get('/status-projects/create/{lang}/{item_id}', [StatusProjectController::class, 'createLanguage'])->name('status-projects-create.lang');
    Route::get('/type-projects/create/{lang}/{item_id}', [TypeProjectController::class, 'createLanguage'])->name('type-projects-create.lang');
    Route::get('/investors/create/{lang}/{item_id}', [InvestorController::class, 'createLanguage'])->name('investors-create.lang');
    Route::get('/projects/create/{lang}/{item_id}', [ProjectController::class, 'createLanguage'])->name('projects-create.lang');
    Route::get('/activities/create/{lang}/{item_id}', [ActivityController::class, 'createLanguage'])->name('activities-create.lang');
    Route::get('/events/create/{lang}/{item_id}', [EventController::class, 'createLanguage'])->name('events-create.lang');
    Route::get('/applications/create/{lang}/{item_id}', [ApplicationController::class, 'createLanguage'])->name('applications-create.lang');
    Route::get('/about-us/create/{lang}/{item_id}', [AboutUController::class, 'createLanguage'])->name('about-us-create.lang');
    Route::get('/news/create/{lang}/{item_id}', [NewsController::class, 'createLanguage'])->name('news-create.lang');
    Route::get('/journals/create/{lang}/{item_id}', [JournalController::class, 'createLanguage'])->name('journals-create.lang');
    Route::get('/systems/create/{lang}/{item_id}', [SystemController::class, 'createLanguage'])->name('systems-create.lang');
    Route::get('/recruits/create/{lang}/{item_id}', [RecruitController::class, 'createLanguage'])->name('recruits-create.lang');
    Route::get('/introduces/create/{lang}/{item_id}', [IntroduceController::class, 'createLanguage'])->name('introduces-create.lang');

    //Introducate Detail
    Route::get('/introduce-detail/{introduce}', [IntroduceDetailController::class, 'index'])->name('introduce_detail_list');
    Route::get('/introduce-detail/create/{introduce}', [IntroduceDetailController::class, 'create'])->name('introduce_detail_create');
    Route::post('/introduce-detail/create/{introduce}', [IntroduceDetailController::class, 'store'])->name('introduce_detail_store');
    Route::get('/introduce-detail/edit/{introduce}/{introduceDetail}', [IntroduceDetailController::class, 'edit'])->name('introduce_detail_edit');
    Route::patch('/introduce-detail/edit/{introduce}/{introduceDetail}', [IntroduceDetailController::class, 'update'])->name('introduce_detail_update');
    Route::delete('/introduce-detail/{introduce}/{introduceDetail}', [IntroduceDetailController::class, 'destroy'])->name('introduce_detail_destroy');


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
