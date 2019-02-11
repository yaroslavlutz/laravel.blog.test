<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Article;

class DashboardController extends Controller
{

    public function index() {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'articles' => Article::lastArticles(5),
            'count_categories' => Category::count(),
            'count_articles' => Article::count(),
        ]);
    }

}
