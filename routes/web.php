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
    return view('site.homepage');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Frame Sizes
Route::resource('frame-sizes', FrameSizeController::class);

//Frame Order Images
Route::resource('frame-order-images', FrameOrderImageController::class);

//Frames
Route::resource('frames', FrameController::class);
Route::get('/request-frames', 'FrameController@requestFrame')->name('request.frames');


//Images
Route::get('/uploads/frames_images/{image}', function () { })->name('frames.images.full');
Route::get('/uploads/frames_images_large/{image}', function () { })->name('frames.images.large');
Route::get('/uploads/frames_images_thumb/{image}', function () { })->name('frames.images.thumb');
Route::get('/uploads/frames_images_raw/{image}', function () { })->name('frames.images.raw');

Route::get('/uploads/frames_images/', function () { })->name('frames.images.full_path');
Route::get('/uploads/frames_images_large/', function () { })->name('frames.images.large_path');
Route::get('/uploads/frames_images_thumb/', function () { })->name('frames.images.thumb_path');
Route::get('/uploads/frames_images_raw/', function () { })->name('frames.images.raw_path');

Route::get('/uploads/frame_orders_images/', function () { })->name('frame_orders.images.full_path');
Route::get('/uploads/frame_orders_images_large/', function () { })->name('frame_orders.images.large_path');
Route::get('/uploads/frame_orders_images_thumb/', function () { })->name('frame_orders.images.thumb_path');
Route::get('/uploads/frame_orders_images_raw/', function () { })->name('frame_orders.images.raw_path');