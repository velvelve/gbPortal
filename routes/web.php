<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\DataUploadController;
use App\Http\Controllers\ProfileController as UserProfileController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ProfilesController as AdminProfilesController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello/{name}', static function (string $name) {
    return "Hello, $name";
});
Route::get('/about', static function () {
    return "This is geekbrains web developer study project";
});
Route::get('/news/{id}', static function (string $id) {
    return "News with id $id weren't found";
});

//Hello
Route::get('/hello', [HelloController::class, 'index'])->name('hello.index');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/account', AccountIndexController::class)->name('account');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
//Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'is.admin'], static function () {
        Route::get('/parser', ParserController::class)->name('parser');
        Route::get('/', AdminIndexController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/profiles', AdminProfilesController::class);
    });
});
//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');

//News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

//Guest routes
Route::group(['middleware' => 'guest'], function(){
    Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])
    ->where('driver', '\w+')
    ->name('social-providers.redirect');
    Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])
    ->where('driver', '\w+')
    ->name('social-providers.callback');
});

//DataUpload
Route::resource('/dataupload', DataUploadController::class);

Route::get('/collection', function () {
    $array = [1, 2, 3, 4, 5, 55, 56, 877];
    $collection = collect($array);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
