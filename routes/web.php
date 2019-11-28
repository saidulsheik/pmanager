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
    //return view('welcome');
   return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//creating comapany
Route::resource('company', 'CompanyController');
//creating project
Route::resource('project', 'ProjectController');
//creating comments
Route::resource('comment', 'CommentController');
//creating task
Route::resource('task', 'TaskController');
//creating user role
Route::resource('role', 'RoleController');
//creating user
Route::resource('user', 'UserController');
//creating menu group
Route::resource('groupmenu', 'GroupMenuController');
//creating menu
Route::resource('menu', 'MenuController');