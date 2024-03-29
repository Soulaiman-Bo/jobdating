<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Models\Announcement;
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

Route::get('/', function () {



    // $announcements = Announcement::with(['company' => function ($query) {
    //     $query->with('logo'); // Eager load company logo
    // }])->get();

    $announcements = Announcement::all();

    // dd($announcements);



    return view('home', ['announcements' => $announcements]);


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');;


Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('announcements', AnnouncementController::class)->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

