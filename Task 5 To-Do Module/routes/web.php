<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


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


Route::get('/', [TodoController::class, 'index'])->name('todo.index');


Route::post('/lists', [TodoController::class, 'storeList'])->name('storeList');


Route::put('/lists/{list}', [TodoController::class, 'updateList'])->name('updateList');


Route::delete('/lists/{list}', [TodoController::class, 'deleteList'])->name('deleteList');


Route::post('/lists/{list}/tasks', [TodoController::class, 'storeTask'])->name('storeTask');


Route::patch('/tasks/{task}', [TodoController::class, 'updateTask'])->name('updateTask');


Route::delete('/tasks/{task}', [TodoController::class, 'deleteTask'])->name('deleteTask');


Route::get('/lists/{list}/edit', [TodoController::class, 'editList'])->name('editList');


Route::get('/tasks/{task}/edit', [TodoController::class, 'editTask'])->name('editTask');
