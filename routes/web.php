<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\Postcontroller;


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

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('/contact','WelcomeController@contact')->name('contact');
Route::get('/history','WelcomeController@history')->name('history');
Route::get('/profile/{id}','WelcomeController@profile')->name('profile');
Route::get('/listalbum','WelcomeController@listalbum')->name('listalbum');
Route::get('/showalbum/{album}','WelcomeController@showalbum')->name('showalbum');


Route::get('blog/posts/{post}',[Postcontroller::class,'show'])->name('blog.show');
Route::get('blog/category/{category}',[Postcontroller::class,'category'])->name('blog.category');
Route::get('blog/tag/{tag}',[Postcontroller::class,'tag'])->name('blog.tag');

Route::get('blog/category',[Postcontroller::class,'search'])->name('blog.search');


Auth::routes();


//Route::resource('category','CategoryController')->middleware('auth');
Route::middleware(['auth','control'])->group(function(){

Route::get('/admin','AdminController@index')->name('admin');

Route::resource('category','CategoryController');
Route::resource('posts','PostController');
Route::resource('tags','TagController');
Route::resource('files','FileController');


Route::resource('subjectyear','SubjectYearController');
Route::resource('subject','SubjectController')->names([
  'store' => 'subject.store',
  'show' => 'subject.show',
  'create' => 'subject.create',
  'destroy' => 'subject.destroy',
  'update' => 'subject.update',
  'edit' => 'subject.edit',
  'finish' => 'subject.finish',
  'open' => 'subject.open',
  'createOnet' => 'subject.createOnet',
  'storeOnet' => 'subject.storeOnet',
  'editOnet' => 'subject.editOnet',
  'updateOnet' => 'subject.updateOnet',
  'homeroom' => 'subject.homeroom',
  'grade' => 'subject.grade',
  'updategrade' => 'subject.updategrade'
]);
Route::post('/subject/store/{id}/{studentyear}', 'SubjectController@store')->name('subject.store');
Route::get('/subject/show/{id}', 'SubjectController@show')->name('subject.show');
Route::get('/subject/create/{id}/{studentyear}', 'SubjectController@create')->name('subject.create');
Route::delete('/subject/destroy/{id}/{subject}', 'SubjectController@destroy')->name('subject.destroy');
Route::put('/subject/update/{id}/{studentyear}', 'SubjectController@update')->name('subject.update');
Route::get('/subject/edit/{id}/{subject}', 'SubjectController@edit')->name('subject.edit');
Route::get('/subject/finish/{id}', 'SubjectController@finish')->name('subject.finish');
Route::get('/subject/open/{id}', 'SubjectController@open')->name('subject.open');
Route::get('/subject/createOnet/{id}', 'SubjectController@createOnet')->name('subject.createOnet');
Route::post('/subject/storeOnet/{id}', 'SubjectController@storeOnet')->name('subject.storeOnet');
Route::get('/subject/editOnet/{id}/{onet}', 'SubjectController@editOnet')->name('subject.editOnet');
Route::put('/subject/updateOnet/{id}', 'SubjectController@updateOnet')->name('subject.updateOnet');
Route::put('/subject/homeroom/{id}', 'SubjectController@homeroom')->name('subject.homeroom');
Route::get('/subject/grade/{subject}', 'SubjectController@grade')->name('subject.grade');
Route::put('/subject/updategrade/{thetype}/{subject}/{id}', 'SubjectController@updategrade')->name('subject.updategrade');

Route::resource('student','StudentController')->names([
  'destroy' => 'student.destroy',
  'edit' => 'student.edit',
  'update' => 'student.update',
  'score' => 'student.score'
]);
Route::delete('/student/destroy/{user}', 'StudentController@destroy')->name('student.destroy');
Route::get('/student/edit/{user}', 'StudentController@edit')->name('student.edit');
Route::put('/student/update/{user}', 'StudentController@update')->name('student.update');
Route::put('/student/score/{id}', 'StudentController@score')->name('student.score');

Route::resource('wh','WhController')->names([
  'show' => 'wh.show',
  'score' => 'wh.score',
]);
Route::get('/wh/show/{id}', 'WhController@show')->name('wh.show');
Route::put('/wh/score/{class}/{whyear}', 'WhController@score')->name('wh.score');

Route::resource('personnel','PersonnelController')->names([
  'edit' => 'personnel.edit',
  'destroy' => 'personnel.destroy',
  'update' => 'personnel.update'
]);
Route::get('/personnel/edit/{user}', 'PersonnelController@edit')->name('personnel.edit');
Route::delete('/personnel/destroy/{user}', 'PersonnelController@destroy')->name('personnel.destroy');
Route::put('/personnel/update/{user}', 'PersonnelController@update')->name('personnel.update');

Route::resource('postimage','PostImageController')->names([
    'store' => 'postimage.store',
    'show' => 'postimage.show'
]);
Route::post('/postimage/store/{id}', 'PostImageController@store')->name('postimage.store');
Route::get('/postimage/show/{id}', 'PostImageController@show')->name('postimage.show');

Route::resource('album','AlbumController');
Route::resource('albumimage','AlbumImageController')->names([
    'store' => 'albumimage.store',
    'show' => 'albumimage.show'
]);
Route::post('/albumimage/store/{id}', 'AlbumImageController@store')->name('albumimage.store');
Route::get('/albumimage/show/{id}', 'AlbumImageController@show')->name('albumimage.show');



});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
