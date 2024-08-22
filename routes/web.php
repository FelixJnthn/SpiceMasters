<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

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

Route::get("/", function () {
    return view("auth.login");
});



Route::group(['middleware' => 'auth'], function() {
    //users only
    Route::get('quizeasy',[\App\Http\Controllers\QuizController::class, 'quizeasy'])->name('client.quizeasy');
    Route::get('quizmedium',[\App\Http\Controllers\QuizController::class, 'quizmedium'])->name('client.quizmedium');
    Route::get('quizhard',[\App\Http\Controllers\QuizController::class, 'quizhard'])->name('client.quizhard');

    Route::post('quizeasy',[\App\Http\Controllers\QuizController::class, 'store'])->name('client.quiz.store');
    
    Route::get('results/{result_id}',[\App\Http\Controllers\ResultController::class, 'show'])->name('client.results.show');
    Route::get('home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get ('difficulty', [\App\Http\Controllers\DifficultyController::class,'index'])->name('client.difficulty');
    Route::get ('recipe', [\App\Http\Controllers\InformationController::class,'index'])->name('client.recipe');
    Route::get ('leaderboard', [\App\Http\Controllers\LeaderboardController::class, 'index'])->name('client.leaderboard');

// admin only
Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    // Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    // Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    
    // questions
    Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);

    // options
    Route::resource('options', \App\Http\Controllers\Admin\OptionController::class);

    // results
    Route::resource('results', \App\Http\Controllers\Admin\ResultController::class);
    
    // recipes
    Route::resource('recipe', \App\Http\Controllers\Admin\RecipeController::class);


});

});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
