<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Authentification paths
Route::prefix('/auth')->controller(AuthentificationController::class)->group(function(){
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/refresh', 'refresh')->name('refresh');
});


Route::get('/posts', [PostController::class, 'posts']);

Route::prefix('/post')->group(function(){
    Route::get('/', [PostController::class, 'post']);
    Route::post('/', [PostController::class, 'create']);
    Route::patch('/', [PostController::class, 'update']);
    Route::delete('/', [PostController::class, 'delete']);

    Route::prefix('assign')->group(function(){
        Route::post('', [PostController::class, 'assignCateg']);
        Route::delete('', [PostController::class, 'removeCateg']);
    });
});

Route::prefix('/categorie')->group(function(){
    Route::post('', [CategorieController::class, 'add']);
});
