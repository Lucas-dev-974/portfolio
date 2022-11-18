<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
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

Route::group(['middleware' => ['auth:api'] ], function(){
    
    Route::get('/token/check', [AuthentificationController::class, 'tokenTest']);

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
        Route::patch('', [CategorieController::class, 'update']);
        Route::get('/{query}', [CategorieController::class, 'search']);
        Route::delete('/{id}', [CategorieController::class, 'delete']);
    });    
    
    Route::prefix('/project')->group(function(){
        Route::post('/', [ProjectController::class, 'create']);
        Route::patch('/', [ProjectController::class, 'update']);
        Route::delete('/', [ProjectController::class, 'delete']);

        Route::prefix('assign')->group(function(){
            Route::post('', [ProjectController::class, 'assignCateg']);
            Route::delete('', [ProjectController::class, 'removeCateg']);
        });

        Route::prefix('medias')->group(function(){
            Route::post('',   [ProjectController::class, 'add_medias']);
            Route::delete('', [ProjectController::class, 'remove_medias']);
        });
    });

});


Route::get('/project/{id}', [ProjectController::class, 'one']);
Route::get('/posts', [PostController::class, 'posts']);

Route::get('/categories', [CategorieController::class, 'list']);

Route::get('/projects', [ProjectController::class, 'list']);
Route::get('/projects/by/categ', [ProjectController::class, 'listByCategorie']);

Route::prefix('media')->group(function(){
    Route::get('/',    [MediaController::class, 'get']);
    Route::delete('/', [MediaController::class, 'delete']);
});