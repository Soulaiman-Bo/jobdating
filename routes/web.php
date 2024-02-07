<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');;


Route::resource('company', CompanyController::class)->middleware(['auth', 'checkAdmin']);
Route::resource('announcements', AnnouncementController::class)->middleware(['auth',  'checkAdmin']);
Route::post('announcements/{announcement_id}/add', [AnnouncementController::class, 'addSkillsToAnnouncements'])
    ->middleware(['auth'])
    ->name('announcements.add');
Route::post('announcements/apply', [AnnouncementController::class, 'appltForAnnouncements'])
    ->middleware(['auth'])
    ->name('announcements.apply');


Route::resource('skills', SkillsController::class)->middleware(['auth']);
Route::post('skills/{user_id}/add', [SkillsController::class, 'addSkillsToUser'])
    ->middleware(['auth'])
    ->name('skills.add');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
