<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Article\IndexController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

//импортируем класс контроллер
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/my_page', function () {
    return 'this is my page';
});
Route::group(['namespace' => '\App\Http\Controllers\Article'],function (){
    Route::get('/articles', 'IndexController')->name('article.index');
    Route::get('/articles/create','CreateController')->name('article.create');
    Route::post('/articles','StoreController')->name('article.store');
    Route::get('/articles/{article}','ShowController')->name('article.show');
    Route::get('/articles/{article}/edit','EditController')->name('article.edit');
    Route::patch('/articles/{article}','UpdateController')->name('article.update');
    Route::delete('/articles/{article}','DestroyController')->name('article.delete');

});


Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'],function (){

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Article'],function (){
        Route::get('/article', 'IndexController')->name('admin.article.index');
    });

});
//Route::get('/article', [ArticleController::class, 'showArticle'])->name('articles.index');//контролле и название функции

//Route::get('/admin',[IndexController::class, 'index']);
//Route::get('/article/delete',[ArticleController::class, 'delete']);
//Route::get('/article/first_or_create',[ArticleController::class, 'firstOrCreate']);
//Route::get('/article/update_or_create',[ArticleController::class, 'updateOrCreate']);
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
