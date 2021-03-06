<?php

use Inertia\Inertia;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');

Route::group(['auth:sanctum', 'verified'], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/courses/{course_id}', [CoursesController::class, 'show'])->name('courses.show');
    Route::post('/courseProgress', [CoursesController::class, 'progress'])->name('course.progress');
    Route::get('/course/new', [CoursesController::class, 'new'])->name('course.new');
    Route::post('/course/create', [CoursesController::class, 'create']);
});
