<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /** @param $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function category($alias) {
        $category = Category::where('alias',$alias)->first();
        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(5)
        ]);
    }

    /** @param $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function article($alias) {
        return view('blog.article', [
            'article' => Article::where('alias', $alias)->first()
        ]);
    }

}
