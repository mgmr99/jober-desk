<?php

use App\Models\User;
use App\Models\Report;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\ApplicantController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\reviewer\ReviewJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/login',function(){return view('login');} )->name('login');

Route::get('/register', function () {return view('register');})->name('register');


Route::post('/register', [UserController::class, 'registerUser'])->name('user.register');

Route::post('/login', [UserController::class, 'authenticate'])->name('user.login');


Route::group(['middleware' => ['role:user']],function()
{  
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::get('/companies', [UserController::class, 'companies'])->name('user.companies');

    //jobs
    Route::group(['prefix' => 'jobs'], function () 
    {
        Route::get('/', [JobController::class, 'index'])->name('user.jobs');
        Route::get('/search', [JobController::class, 'search'])->name('user.jobs.search');


        Route::get('show/{id}', [JobController::class, 'show'])->name('user.jobs.show');
        Route::post('show/{id}', [JobController::class, 'show'])->name('user.jobs.show');

        Route::get('show/{id}/apply', [JobController::class, 'filldetails'])->name('user.fill.details');
        Route::post('show/{id}/apply/details', [JobController::class, 'storedetails'])->name('user.store.details');

        Route::get('/show/apply/{id}', [JobController::class, 'store'])->name('user.application.store');

        Route::get('/report', [JobController::class, 'report'])->name('user.report');
        Route::post('/report', [JobController::class, 'storeReport'])->name('user.storeReport');
    });
});

//Admin and Reviewer Routes
Route::group(['middleware' => ['role:admin|reviewer']], function () {
    
    Route::get('/admin',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');

    //jobs
    Route::get('/admin/jobs', [AdminJobController::class, 'index'])->name('admin.jobs.index');

    Route::group(['middleware' => ['permission:create_user']], function () 
    {  
        //jobs 
        Route::group(['prefix'=>'admin/jobs'],function(){
            Route::get('create', [AdminJobController::class, 'create'])->name('admin.jobs.create');
            Route::post('store', [AdminJobController::class, 'store'])->name('admin.jobs.store');
            Route::get('edit/{id}', [AdminJobController::class, 'edit'])->name('admin.jobs.edit');
            Route::get('show/{id}', [AdminJobController::class, 'show'])->name('admin.jobs.show');
            Route::post('update/{id}', [AdminJobController::class, 'update'])->name('admin.jobs.update');
            Route::delete('delete/{id}', [AdminJobController::class, 'destroy'])->name('admin.jobs.delete');           
        }); 

        //users
        Route::group(['prefix'=>'admin/users'],function()
        {

            Route::get('/', [AdminUserController::class, 'index'])->name('admin.users');
            Route::get('/search', [AdminUserController::class, 'search'])->name('admin.users.search');
            Route::get('create', [AdminUserController::class, 'create'])->name('admin.users.create');
            Route::post('store', [AdminUserController::class, 'store'])->name('admin.users.store');
            Route::get('edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
            Route::post('update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
            Route::delete('delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
        });

        //roles
        Route::group(['prefix'=>'admin/roles'],function()
        {
            Route::get('/', [RoleController::class, 'index'])->name('admin.roles');
            Route::get('/search', [RoleController::class, 'search'])->name('admin.roles.search');
            Route::get('create', [RoleController::class, 'create'])->name('admin.roles.create');
            Route::post('store', [RoleController::class, 'store'])->name('admin.roles.store');
            Route::put('update/{id}', [RoleController::class, 'update'])->name('admin.roles.update');
        });

        //applicants
        Route::group(['prefix'=>'admin/applicants'],function(){
            Route::get('/', [ApplicantController::class, 'index'])->name('admin.applicants');
            Route::get('/search', [ApplicantController::class, 'search'])->name('admin.applicants.search');
            Route::get('/show/{id}', [ApplicantController::class, 'show'])->name('admin.applicants.show');
            Route::delete('delete/{id}', [ApplicantController::class, 'destroy'])->name('admin.applicants.delete');
        });

        //reports
        Route::group(['prefix'=>'admin/reports'],function(){
            Route::get('/', [ReportController::class, 'index'])->name('admin.reports');
            Route::get('/show/{id}', [ReportController::class, 'show'])->name('admin.reports.show');
            Route::delete('delete/{id}', [ReportController::class, 'destroy'])->name('admin.reports.delete');
        });

        //notifications
        Route::group(['prefix'=>'admin/notifications'],function(){
            Route::get('/', [NotificationController::class, 'index'])->name('admin.notifications');
            Route::post('mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('admin.notifications.markAsRead');
        });

    });

    
    Route::group(['middleware'=> ['permission:publish_job|create_user']],function(){

        //review-jobs
        Route::group(['prefix'=>'admin/review-jobs'],function(){
            Route::get('/', [ReviewJobController::class, 'index'])->name('admin.review-jobs');
            Route::get('publish/{id}', [ReviewJobController::class, 'publish'])->name('admin.review-jobs.publish');
            Route::get('unpublish/{id}', [ReviewJobController::class, 'unpublish'])->name('admin.review-jobs.unpublish');
        });

    });

});