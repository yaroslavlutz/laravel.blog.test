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

Route::get('/blog/category/{alias?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{alias?}', 'BlogController@article')->name('article');


/** 2) FOR BACKEND part (Admin-Panel).
*/
Route::group( [ 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth'] ], function() {
        /* For: laravel.blog.test/admin */
    Route::get('/', ['uses'=>'DashboardController@index', 'as'=>'admin_index']); //OR: Route::get(..)->name('admin_index');

        /* For: laravel.blog.test/admin/category */
    Route::resource('/category', 'CategoryResourceController', [
        'names'=>[
            'index'=>'admin_categories_show',
            'show'=>'admin_category_show',
            'create'=>'admin_category_create',
            'store'=>'admin_category_store', 
            'edit'=>'admin_category_edit',
            'update'=>'admin_category_update',
            'destroy'=>'admin_category_destroy',
            ]
    ]);

        /* For: laravel.blog.test/admin/article */
    Route::resource('/article', 'ArticleResourceController', [
        'names'=>[
            'index'=>'admin_articles_show',
            'show'=>'admin_article_show',
            'create'=>'admin_article_create',
            'store'=>'admin_article_store',
            'edit'=>'admin_article_edit',
            'update'=>'admin_article_update',
            'destroy'=>'admin_article_destroy',
        ]
    ]);

    /* For: laravel.blog.test/admin/user_managment/user */
    Route::group(['prefix'=>'user_managment', 'namespace'=>'UserManagment'], function(){
        Route::resource('/user', 'UserResourceController', [
            'names'=>[
                'index'=>'admin_user_managment',
                'create'=>'admin_user_create',
                'store'=>'admin_user_store',
                'edit'=>'admin_user_edit',
                'update'=>'admin_user_update',
                'destroy'=>'admin_user_destroy',
            ]
        ]);
    });

});
