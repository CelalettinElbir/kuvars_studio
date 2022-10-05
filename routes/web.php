<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\adminAuthController;
use App\Http\Controllers\admin\adminPageController;
use App\Http\Controllers\FrontprojectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [HomeController::class, 'index']);



// -----------------------------------------------ADMİN------------------------------------------------------//

Route::controller(adminAuthController::class)->prefix("admin")->name("admin.")->group(function () {

    Route::get("/login", "login")->name("login");
    Route::post("/login", "authenticate")->name("authenticate");
});


Route::controller(adminPageController::class)->prefix("admin")->name("admin.")->group(function () {

    Route::get("/dashboard", "index")->name("dashboard");
});


route::controller(FrontprojectController::class)->prefix("/projects")->name("projects.")->group(function () {

    route::get("/index", "index")->name("index");
    route::get("/{Project}",'show')->name("detail");
    route::get("/{Project}/vr", "showVr")->name("vr");  
    
});




route::controller(ProjectController::class)->prefix("admin/projects")->name("admin.projects.")->group(function () {

    route::get("/index", "index")->name("index");
    route::get("/create", "create")->name("create");
    route::delete("/{Project}", "destroy")->name("delete");
    route::post("/", "store")->name("store");
    route::get("/create", "create")->name("create");
    route::get("{Project}/edit", "edit")->name("edit");
    route::PUT("/{Project}", "update")->name("update");

    
});


// ------------------------------------------------------------------------------------------------//
