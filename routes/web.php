<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use function Laravel\Prompts\alert;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/prueba', function () {

    $data = ['nombre' => 'Marlon Andres', 'edad' => 26];

    $nacionalidad = 'Colombiana';
            
    return view('prueba', compact('data', 'nacionalidad'));
});

Route::get('/redireccionGay', function () {
    return view('redireccion');
})->name('redireccion');

Route::resource('post', PostController::class);

/*Route::get('post', [PostController::class, 'index']);
Route::get('post/{post}', [PostController::class, 'store']);
Route::get('post/{post}/edit', [PostController::class, 'edit']);
Route::get('post/create', [PostController::class, 'create']);

Route::post('post', [PostController::class, 'store']);
Route::put('post/{post}', [PostController::class, 'update']);
Route::post('post/{post}', [PostController::class, 'delete']);*/

require __DIR__.'/auth.php';