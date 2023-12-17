<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SectionContentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\User\ContentController as UserContentController;
use App\Http\Controllers\User\QuizController as UserQuizController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/laman-sejarah/{id}', [LandingPageController::class, 'lamanSejarahDetail'])->name('lp-laman-sejarah-detail');
Route::get('/laman-sejarah', [LandingPageController::class, 'lamanSejarah'])->name('lp-laman-sejarah');


Route::get('/login', function () {
    // return view('welcome');
    return view('login');
});

Route::get('/register', function () {
    // return view('welcome');
    return view('register');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('about', AboutController::class);
    Route::resource('activities', ActivitiesController::class);

    Route::resource('section', SectionController::class);
    Route::get('section-content/c/{content}', [SectionContentController::class, 'index'])->name('section-content.content');
    Route::resource('section-content', SectionContentController::class);



    Route::post('/activities/uploadfile', [App\Http\Controllers\ActivitiesController::class, 'uploadfile'])->name('activities.uploadeditor');
    // Route::delete('comment/{id}', [App\Http\Controllers\ActivitiesController::class, 'destroyComment'])->name('comment.destroy');

    // Route::get('/static/{name}', [AboutController::class, 'static'])->name('static.index');
    // Route::put('/static/{id}', [AboutController::class, 'staticUpdate'])->name('static.update');
});


// Route::group(['middleware' => 'auth'], function () {

//     Route::post('/penilaian-kesadaran-sejarah', [LandingPageController::class, 'quizSubmit'])->name('lp-penilaian-post');
//     Route::get('/penilaian-kesadaran-sejarah/{id}', [LandingPageController::class, 'question'])->name('lp-question');
//     Route::get('/penilaian-kesadaran-sejarah/result/{id}', [LandingPageController::class, 'quizResult'])->name('lp-penilaian-result');
//     Route::post('/laman-sejarah', [LandingPageController::class, 'lamanSejarahStore'])->name('lp-post-store');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('lp-index');
Route::get('/activities/{slug}', [LandingPageController::class, 'detail'])->name('lp-activities.detail');
Route::get('/activities', [LandingPageController::class, 'category'])->name('lp-activities.index');
// Route::get('/search', [LandingPageController::class, 'search'])->name('lp-search');
// Route::get('/penilaian-kesadaran-sejarah', [LandingPageController::class, 'quiz'])->name('lp-penilaian');
// Route::get('/policy', [LandingPageController::class, 'policy'])->name('lp-policy');
// Route::get('/termofuse', [LandingPageController::class, 'termofuse'])->name('lp-termofuse');
// Route::post('/comment', [LandingPageController::class, 'comment'])->name('lp-post-comment');
