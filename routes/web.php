<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\adminAuthController;
use App\Http\Controllers\admin\adminPageController;

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

// Route::controller(ProjectController::class)->prefix("project")->group(function () {

//     Route::get('/', 'index');
// });


// -----------------------------------------------ADMİN------------------------------------------------------//

Route::controller(adminAuthController::class)->prefix("admin")->name("admin.")->group(function () {

    Route::get("/login", "login")->name("login");
    Route::post("/login", "authenticate")->name("authenticate");
});


Route::controller(adminPageController::class)->prefix("admin")->name("admin.")->group(function () {

    Route::get("/dashboard", "index")->name("dashboard");
});





Route::prefix('admin')->group(function () {
    Route::resource('projects', ProjectController::class);
});


// ------------------------------------------------------------------------------------------------//
