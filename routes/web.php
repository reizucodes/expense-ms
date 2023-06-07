<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\DashboardController as UserDashBoard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class);
});

Route::group(['as' => '', 'prefix' => '', 'middleware' => ['auth', 'isUser']], function () {
    Route::get('dashboard', [UserDashboard::class, 'index'])->name('dashboard');
});



/*

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    //return "hello user";
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::prefix('')->middleware('auth')->group(function () {
    return "This is for users";
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//route naming template I
/*
    NOTE: if middleware is multiple use this: middleware(['',''])
    Route::prefix(prefix_name)->middleware('auth')->group(function(){
        put routes here...
    });
*/

//route naming template II (OJT)
/*
    note: do NOT forget to reinsert the 'verified' in the middleware section to implement the verification email first for applicants
    Route::group(['as' => '', 'prefix' => '', 'middleware' => ['auth', 'applicant', 'verified']], function () {
        Route::get('dashboard', [App\Http\Controllers\Applicant\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('application', App\Http\Controllers\Applicant\ApplicationController::class);
    });
*/
require __DIR__ . '/auth.php';
