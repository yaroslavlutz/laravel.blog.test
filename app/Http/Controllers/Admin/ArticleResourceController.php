<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;
use App\Category;

class ArticleResourceController extends Controller
{
    /** Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.articles.index')->with( 'articles', $articles );
    }

    /** Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create() {

        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get();
        return view('admin.articles.create')
            ->with( 'article', [] )
            ->with( 'categories', $categories )
            ->with( 'delimiter', '' );
    }

    /** Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $article = Article::create( $request->all() );

        //Categories
        if( $request->input('categories') ) :
            $article->categories()->attach( $request->input('categories') );
        endif;

        return redirect()->route('admin_articles_show');
    }

    /** Display the specified resource.
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
    */
    public function show(Article $article)
    {
        //
    }

    /** Show the form for editing the specified resource.
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
    */
    public function edit(Article $article) {
        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get();
        return view('admin.articles.edit', [
            'article'    => $article,
            'categories' => $categories,
            'delimiter'  => ''
        ]);
    }

    /** Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Article $article){
        $article->update( $request->except('alias') );
        $article->categories()->detach();

        if( $request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin_articles_show');
    }

    /** Remove the specified resource from storage.
    * @param  \App\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function destroy(Article $article) {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin_articles_show');
    }
}
