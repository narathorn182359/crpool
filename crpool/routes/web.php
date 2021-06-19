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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('home');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/product', 'IndexController@product')->name('product');
Route::get('/services', 'IndexController@services')->name('services');
Route::get('/project', 'IndexController@project')->name('project');
Route::get('/gallery', 'IndexController@gallery')->name('gallery');
Route::get('/gallery/{id}/{name}', 'GalleryController@index');
Route::get('/gallery/{id}', 'GalleryController@galleryedit')->name('galleryedit');
Route::post('/multiple-image-uploadedit/{id}', 'GalleryController@galleryeditsave')->name('galleryeditsave');
Route::get('/productview/{id}', 'IndexController@productview');
Route::post('/multiple-image-upload', 'GalleryController@store');
Route::post('/addproduct', 'ProductController@store');
Route::post('/data_gallery', 'GalleryController@data_gallery');
Route::post('/delete_gallery', 'GalleryController@delete_gallery');
Route::post('/data_productget', 'ProductController@data_productget');
Route::get('/addproduct', 'ProductController@index');
Route::get('/productedit/{id}', 'ProductController@productedit');
Route::post('/productedits/{id}', 'ProductController@saveedit');
Route::post('/delete_product', 'ProductController@delete_product');





