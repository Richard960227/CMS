<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AudioLibraryController;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\BroadcastModeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InterpreterController;
use App\Http\Controllers\MusicalGenreController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\RoleController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/stations', StationController::class)->names([
        'index' => 'stations.index',
        'create' => 'stations.create',
        'store' => 'stations.store',
        'show' => 'stations.show',
        'edit' => 'stations.edit',
        'update' => 'stations.update',
        'destroy' => 'stations.destroy',
    ]);

    Route::resource('/programs', ProgramController::class)->names([
        'index' => 'programs.index',
        'create' => 'programs.create',
        'store' => 'programs.store',
        'show' => 'programs.show',
        'edit' => 'programs.edit',
        'update' => 'programs.update',
        'destroy' => 'programs.destroy',
    ]);

    Route::resource('/audio-libraries', AudioLibraryController::class)->names([
        'index' => 'audio-libraries.index',
        'create' => 'audio-libraries.create',
        'store' => 'audio-libraries.store',
        'show' => 'audio-libraries.show',
        'edit' => 'audio-libraries.edit',
        'update' => 'audio-libraries.update',
        'destroy' => 'audio-libraries.destroy',
    ]);

    Route::resource('/podcasts', PodcastController::class)->names([
        'index' => 'podcasts.index',
        'create' => 'podcasts.create',
        'store' => 'podcasts.store',
        'show' => 'podcasts.show',
        'edit' => 'podcasts.edit',
        'update' => 'podcasts.update',
        'destroy' => 'podcasts.destroy',
    ]);

    Route::resource('/music', MusicController::class)->names([
        'index' => 'music.index',
        'create' => 'music.create',
        'store' => 'music.store',
        'show' => 'music.show',
        'edit' => 'music.edit',
        'update' => 'music.update',
        'destroy' => 'music.destroy',
    ]);

    Route::resource('/announcements', AnnouncementController::class)->names([
        'index' => 'announcements.index',
        'create' => 'announcements.create',
        'store' => 'announcements.store',
        'show' => 'announcements.show',
        'edit' => 'announcements.edit',
        'update' => 'announcements.update',
        'destroy' => 'announcements.destroy',
    ]);

    Route::resource('/broadcasts', BroadcastController::class)->names([
        'index' => 'broadcasts.index',
        'create' => 'broadcasts.create',
        'store' => 'broadcasts.store',
        'show' => 'broadcasts.show',
        'edit' => 'broadcasts.edit',
        'update' => 'broadcasts.update',
        'destroy' => 'broadcasts.destroy',
    ]);

    Route::resource('/categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);

    Route::resource('/musical-genres', MusicalGenreController::class)->names([
        'index' => 'musical-genres.index',
        'create' => 'musical-genres.create',
        'store' => 'musical-genres.store',
        'show' => 'musical-genres.show',
        'edit' => 'musical-genres.edit',
        'update' => 'musical-genres.update',
        'destroy' => 'musical-genres.destroy',
    ]);

    Route::resource('/broadcast-modes', BroadcastModeController::class)->names([
        'index' => 'broadcast-modes.index',
        'create' => 'broadcast-modes.create',
        'store' => 'broadcast-modes.store',
        'show' => 'broadcast-modes.show',
        'edit' => 'broadcast-modes.edit',
        'update' => 'broadcast-modes.update',
        'destroy' => 'broadcast-modes.destroy',
    ]);

    Route::resource('/interpreters', InterpreterController::class)->names([
        'index' => 'interpreters.index',
        'create' => 'interpreters.create',
        'store' => 'interpreters.store',
        'show' => 'interpreters.show',
        'edit' => 'interpreters.edit',
        'update' => 'interpreters.update',
        'destroy' => 'interpreters.destroy',
    ]);

    Route::resource('/roles', RoleController::class)->names([
        'index' => 'roles.index',
        'create' => 'roles.create',
        'store' => 'roles.store',
        'show' => 'roles.show',
        'edit' => 'roles.edit',
        'update' => 'roles.update',
        'destroy' => 'roles.destroy',
    ]);

});

require __DIR__ . '/auth.php';
