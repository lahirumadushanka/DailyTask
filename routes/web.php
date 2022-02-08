<?php

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

Route::get('/tasks',function (){
    $data = \App\Models\Task::all();

    return view('tasks') ->with('tasks', $data);
});

Route::post('/saveTask','App\Http\Controllers\TaskController@store');

Route::get('/markAsCompleted/{id}','App\Http\Controllers\TaskController@updateTaskAsMarked');

Route::get('/markAsNotCompleted/{id}','App\Http\Controllers\TaskController@updateTaskAsNotMarked');

Route::get('/deleteTask/{id}','App\Http\Controllers\TaskController@deleteTask');

Route::get('/updatetaskview/{id}','App\Http\Controllers\TaskController@updateTaskView');

Route::post('/updateTask','App\Http\Controllers\TaskController@updateTask');
