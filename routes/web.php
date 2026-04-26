<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::post('/posts', function () {
    $data = request()->only(['title', 'content']);

    return view('posts.store', compact('data'));
});

Route::get('/posts/{id}', function ($id) {
    return view('posts.show', compact('id'));
})->where('id', '[0-9]+');

Route::get('/posts/{id}/edit', function ($id) {
    return view('posts.edit', compact('id'));
})->where('id', '[0-9]+');

Route::put('/posts/{id}', function ($id) {
    return view('posts.update', compact('id'));
})->where('id', '[0-9]+');

Route::delete('/posts/{id}', function ($id) {
    return view('posts.destroy', compact('id'));
})->where('id', '[0-9]+');
