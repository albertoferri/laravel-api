<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\TechnologyController;

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

//Quando si visita /dashboard tramite una richiesta GET, verrà restituita la vista di DashBoard.

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rotte protette dall'auth che gestiscono previa iscrizione e login,
//Visualizzazione, modifiche e eliminazioni.

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('admin')->group(function () {
        Route::resource('projects', AdminProjectController::class)->parameters(['projects' => 'project:slug']);
        Route::resource('types', TypeController::class);
    });
});

require __DIR__.'/auth.php';

Route::get('/admin', [AdminProjectController::class, 'index'])->middleware(['auth'])->name('admin');

//Rotta accessibile a tutti per la sola Visualizzazione.

Route::get('/', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/admin/types', [TypeController::class, 'show'])->name('admin.types.show');
Route::delete('/admin/types/{type}', [TypeController::class, 'destroy'])->name('admin.types.destroy');
Route::get('/admin/types/create', [TypeController::class, 'create'])->name('admin.types.create');
Route::post('/admin/types', [TypeController::class, 'store'])->name('admin.types.store');


Route::get('/admin/technologies', [TechnologyController::class, 'show'])->name('admin.technologies.show');
Route::delete('/admin/technologies/{technology}', [TechnologyController::class, 'destroy'])->name('admin.technologies.destroy');
Route::get('/admin/technologies/create', [TechnologyController::class, 'create'])->name('admin.technologies.create');
Route::post('/admin/technologies', [TechnologyController::class, 'store'])->name('admin.technologies.store');
