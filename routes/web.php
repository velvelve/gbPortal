<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\DataUploadController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
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

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
    Route::get('/', AdminIndexController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
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

//DataUpload
Route::resource('/dataupload', DataUploadController::class);

Route::get('/collection', function () {
    $array = [1, 2, 3, 4, 5, 55, 56, 877];
    $collection = collect($array);
});

Route::get('/session', function () {
    $all = session()->all();
    $key = 'test';
    if (session()->has($key)) {
        dd($all, session()->get($key));
    }
    session()->put($key, 'Some value');
});
