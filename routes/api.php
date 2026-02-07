<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/**
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
|--------------------------------------------------------------------------
 * Просмотр списка задач: GET /tasks (возвращает все задачи).
 * Просмотр одной задачи: GET /tasks/{id}.
 * Создание задачи: POST /tasks (поля: title, description, status).
 * Обновление задачи: PUT /tasks/{id}.
 * Удаление задачи: DELETE /tasks/{id}.
|--------------------------------------------------------------------------
 */
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::post('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'delete']);
