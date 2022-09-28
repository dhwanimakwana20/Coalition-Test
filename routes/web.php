<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
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

Route::get('/admin', function () {
    return view('master');
});

Route::get('projects',[ProjectsController::class, 'index'])->name('projects');
Route::get('add/project', [ProjectsController::class, 'create'])->name('projects.create');
Route::post('add/project', [ProjectsController::class, 'store'])->name('projects.store');
Route::get('edit/project/{project:id}', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::post('edit/project/{project:id}', [ProjectsController::class, 'update'])->name('projects.update');
Route::get('delete/project/{project:id}', [ProjectsController::class, 'destroy'])->name('projects.delete');


Route::get('tasks/{id?}',[TasksController::class, 'index'])->name('tasks');
Route::get('add/task', [TasksController::class, 'create'])->name('tasks.create');
Route::post('add/task', [TasksController::class, 'store'])->name('tasks.store');
Route::get('edit/task/{task:id}', [TasksController::class, 'edit'])->name('tasks.edit');
Route::post('edit/task/{task:id}', [TasksController::class, 'update'])->name('tasks.update');
Route::get('delete/task/{task:id}', [TasksController::class, 'destroy'])->name('tasks.delete');
Route::post('task/sequence', [TasksController::class, 'sequence'])->name('task.sequence');