<?php

use App\Http\Controllers\CaseConverterController;
use App\Http\Controllers\CounterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['throttle:global'])->group(function () {
    Route::get('counter', [CounterController::class, 'index'])->name('counter');
    Route::post('counter', [CounterController::class, 'store'])->name('counter');

    Route::get('case-converter', [CaseConverterController::class, 'index'])->name('case-converter');
    Route::post('case-converter', [CaseConverterController::class, 'store'])->name('case-converter');
});

require __DIR__ . '/auth.php';
