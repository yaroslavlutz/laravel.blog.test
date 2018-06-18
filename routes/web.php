<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function() {
    return view('blog.home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/** 2) FOR BACKEND part (Admin-Panel).
*/ /* Route::group( [ 'prefix'=>'admin', 'namespace' => 'Admin', 'middleware'=>['role:admin', 'auth'] ], function() { */
Route::group( [ 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth'] ], function() {  //'namespace' => 'Admin', чтобы теперь в роутах для Admin-part не указывать 'uses'=>'Admin\DashboardController@index'

        /* For: laravel.blog.test/admin */
    Route::get('/', ['uses'=>'DashboardController@index', 'as'=>'admin_index']); //OR: Route::get(..)->name('admin_index');

        /* For: laravel.blog.test/admin/category */
    Route::resource('/category', 'CategoryResourceController', [
        'names'=>[
            'index'=>'admin_categories_show',    //laravel.blog.test/admin/category
            'show'=>'admin_category_show',       //laravel.blog.test/admin/category/{id}
            'create'=>'admin_category_create',   //laravel.blog.test/admin/category/create
            'store'=>'admin_category_store',     //POST
            'edit'=>'admin_category_edit',       //laravel.blog.test/admin/category/{id}/edit
            'update'=>'admin_category_update',   //PUT
            'destroy'=>'admin_category_destroy', //DELETE
            ]
    ]);

        /* For: laravel.blog.test/admin/article */
    Route::resource('/article', 'ArticleResourceController', [
        'names'=>[
            'index'=>'admin_articles_show',    //laravel.blog.test/admin/article
            'show'=>'admin_article_show',       //laravel.blog.test/admin/article/{id}
            'create'=>'admin_article_create',   //laravel.blog.test/admin/article/create
            'store'=>'admin_article_store',     //POST
            'edit'=>'admin_article_edit',       //laravel.blog.test/admin/article/{id}/edit
            'update'=>'admin_article_update',   //PUT
            'destroy'=>'admin_article_destroy', //DELETE
        ]
    ]);

});  //__/Route::group( [ 'prefix'=>'admin', 'middleware'=>['auth'] ]
