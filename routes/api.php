<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/tasks', [TarefasController::class, 'getTasks'] );

Route::post('/tasks', [TarefasController::class, 'addTasks'] );

Route::put('/update/{id}', [TarefasController::class, 'updateTasks'] );
Route::delete('/delete/{id}', [TarefasController::class, 'delTasks'] );

