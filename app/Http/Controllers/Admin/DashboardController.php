<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Article;

class DashboardController extends Controller
{
    /** Show Admin Dashboard
    */
    public function index() {
        return view('admin.dashboard', [
            /* передаем в вью последние добавленные 5 Категорий для статистики. Тут используем метод со Scope,кот.мы прописали в `app/Category.php`, - см. `public function scopeLastCategories( $query, $count ) {..}`.
               Сам метод `lastCategories(5)`, указанный тут -это часть,видимо так задумано, от `scopeLastCategories()`, где ключевое слово `scope` мы откидываем и используем в названии данного метода только оставшуюся
               часть и пишем с маленькой буквы/
            Category::lastCategories(5) - значит, что мы возьмем 5 последних записей(5 последних созданных Категорий)
            */
            'categories' => Category::lastCategories(5),
            /* передаем в вью последние добавленные 5 записей(Articles) для статистики. Тут используем метод со Scope,кот.мы прописали в `app/Article.php`, - см. `public function scopeLastArticles( $query, $count ) {..}`.
               Сам метод `lastArticles(5)`, указанный тут -это часть,видимо так задумано, от `scopeLastArticles()`, где ключевое слово `scope` мы откидываем и используем в названии данного метода только оставшуюся
               часть и пишем с маленькой буквы/
            Article::lastArticles(5) - значит, что мы возьмем 5 последних записей(5 последних созданных Article)
            */
            'articles' => Article::lastArticles(5),
            'count_categories' => Category::count(), //общее кол-во категорий в БД
            'count_articles' => Article::count(),  //общее кол-во статей(Articles) в БД
        ]);
    }

} //__/class DashboardController
