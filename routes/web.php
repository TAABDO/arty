<?php

use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\PartnerControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



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
// ====================================== page home

// Route::get('Home' ,[PartnerControllers::class, 'home']);
Route::get('Home' ,[ProjectController::class, 'home'])->name('Home');

// =================================== partner

Route::get('partner',[PartnerControllers::class , 'index'])->name('partner');
Route::get('partner/create',[PartnerControllers::class , 'create'])->name('partner.create');
Route::post('partner/store',[PartnerControllers::class , 'store'])->name('partner.store');
Route::get('partner/{partner}/edit',[PartnerControllers::class , 'edit'])->name('partner.edit');
Route::put('partner/{partner}/update',[PartnerControllers::class , 'update'])->name('partner.update');
Route::post('partner/{partner}/destroy',[PartnerControllers::class , 'destroy'])->name('partner.destroy');
// Route::resource('partner', PartnerController::class);


// ================================== DashboardAdmin



// ======================================= Project


Route::middleware('admin')->group(function () {

    Route::get('DashAdmin',[ProjectController::class, 'dashadmin'])->name('DashAdmin');

// ======================================= Project

Route::get('projects',[ProjectController::class ,'index'])->name('projects');
Route::get('projects/create',[ProjectController::class, 'create'])->name('projects.create');
Route::post('projects/store',[ProjectController::class, 'store'])->name('projects.store');
Route::get('projects/{project}/edit',[ProjectController::class, 'edit'])->name('projects.edit');
Route::put('projects/{project}/update',[ProjectController::class, 'update'])->name('projects.update');
Route::post('projects/{project}/destroy',[ProjectController::class, 'destroy'])->name('projects.destroy');

});

Route::get('artistes',[ArtisteController::class,'index'])->name('artistes.art');
Route::get('artistes/create',[ArtisteController::class, 'artiste'])->name('artistes.create');
Route::post('artistes/store',[ArtisteController::class, 'store'])->name('artistes.store');
Route::get('artistes/{artistes}/edit',[ArtisteController::class, 'edit'])->name('artistes.edit');
Route::put('artistes/{artistes}/update',[ArtisteController::class, 'update'])->name('artistes.update');
Route::post('artistes/{artistes}/destroy',[ArtisteController::class, 'destroy'])->name('artistes.destroy');
// ======================================================= users

Route::get('users',[UserController::class, 'index'])->name('users');
Route::get('users/create',[UserController::class, 'create'])->name('users.create');
Route::post('users/store',[UserController::class, 'store'])->name('users.store');
Route::get('users/{users}/edit',[UserController::class, 'edit'])->name('users.edit');
Route::put('users/{users}/update',[UserController::class, 'update'])->name('users.update');
Route::post('users/{users}/destroy',[UserController::class, 'destroy'])->name('users.destroy');




// =======================================  welcome page

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

// ====================================== dashbaord

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ====================================== auth


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
