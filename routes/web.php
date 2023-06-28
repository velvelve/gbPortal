<?php

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