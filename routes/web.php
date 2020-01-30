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

Route::get('/home','Shelter@index');
Route::get('/home/pets/{cat_id?}','Shelter@pets');
Route::get('/home/register','Shelter@register');
Route::post('/home/register','Shelter@register_action');
Route::get('/home/login','Shelter@login');
Route::post('/home/login','Shelter@login_action');
Route::get('/store/logout', 'Shelter@logout');
Route::get('/home/adopt/{pet_id}','Shelter@adopt');
Route::get('/home/mypets','Shelter@mypets');