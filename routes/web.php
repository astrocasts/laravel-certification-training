<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/first', function () {
    return 'Hello World!';
});

Route::get('user/{id}', function ($id) {
    return 'Hello, user ID '. $id . '!';
})->where('id', '[0-9]+');

Route::get('user/{name}', function ($name) {
    return 'Hello, user name '. $name . '!';
})->where('name', '[A-Za-z]+');

Route::get('user/{name?}', function ($name = null) {
    return 'Hello, user name last '. $name . '!';
});

Route::get('user/{name?}', function ($name = null) {
    return 'Hello, user name LAST '. $name . '!';
});

Route::get('users/{username}', function ($username) {
    return route('user.show', [
        'username' => $username,
        'label' => 'inbox',
    ]);
})->name('user.show');
