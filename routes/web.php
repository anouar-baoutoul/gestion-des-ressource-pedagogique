<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\RessourceStatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResourceViewController;
use App\Http\Controllers\TeacherController;




Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('resource-views', ResourceViewController::class);
Route::resource('ressources', RessourceController::class);
Route::resource('modules', ModuleController::class);
Route::resource('levels', LevelController::class);
Route::resource('groups', GroupController::class);
Route::resource('tags', TagController::class);
Route::resource('users', UserController::class);
Route::resource('teachers', TeacherController::class);

Route::post('ressources/{ressource}/download', [DownloadController::class, 'store'])
    ->name('ressources.download');


Route::get('stats/mes-ressources', [RessourceStatController::class, 'mesRessources'])
    ->name('stats.mes_ressources');

Route::get('stats/global', [RessourceStatController::class, 'global'])
    ->name('stats.global');
