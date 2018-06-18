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
    */ /* Для отображения списка всех Статей(новостей) */
    public function index() {
        $articles = Article::orderBy('created_at', 'desc') //сортировка по дате создания в обратном порядке(т/е сначала идут последние добавленные статьи(новости))
            ->paginate(5); //Методом `paginate` мы вернем коллекцию Статей разбитую постранично на указанное число статей (10 Статей на 1 страницу)

        return view('admin.articles.index')->with( 'articles', $articles );
    }

    /** Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */ /* Для отображения формы для создания новой article. Обработчик этого - метод `store()` */
    public function create() {

        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get(); //коллекция Категорий родительских(у которых поле `parent_cat_id` == 0)
        return view('admin.articles.create')
            ->with( 'article', [] )
            ->with( 'categories', $categories )
            ->with( 'delimiter', '' ); //символ(разделитель) для наглядности вложенности категорий (Родительские / дочерние)
    }

    /** Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $article = Article::create( $request->all() );

        //Categories
        if( $request->input('categories') ) :  //если что-то выбрано(в Форме) в поле(select) name="categories"

            /* 1) `categories()` - метод полиморфной связи меж Категориями и Articles через связующую табл.БД `categoryables`. Этот метод прописан в Модели `Article.php`
               2) В метод `attach()` мы передаем все ID выбранных категорий в Форме, к которым мы хотим отнести данную создаваемую или редактируемую запись(Article)
            */
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
    */ /* Для отображения формы для редактирования новой article. Обработчик этого - метод `update()` */
    public function edit(Article $article) {
        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get(); //коллекция Категорий родительских(у которых поле `parent_cat_id` == 0)
        return view('admin.articles.edit', [
            'article'    => $article,
            'categories' => $categories,
            'delimiter'  => ''  //символ(разделитель) для наглядности вложенности категорий (Родительские / дочерние)
        ]);
    }

    /** Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Article $article){
        $article->update( $request->except('alias') ); //исключаем из обновления поле `alias`,т.к. оно уникально при создании было сгенирировано и нам его более не нужно трогать вообще

        //1.при обновлении определенной Article-записи в табл.`articles` мы сначала уничтожаем(открепляем) все привязанные к ней данные,- в частности Категории,к которым относилась эта запись
        $article->categories()->detach();
        //2.а теперь,если выбрана(ы) новая(ые) Категории для такой Article-записи мы снова делаем перепривязку с пом.метода `attach()` и `Полиморфной связи`,как мы делали(см.выше) в Методе `store()`
        if( $request->input('categories')) :
            /* 1) `categories()` - метод полиморфной связи меж Категориями и Articles через связующую табл.БД `categoryables`. Этот метод прописан в Модели `Article.php`
               2) В метод `attach()` мы передаем все ID выбранных категорий в Форме, к которым мы хотим отнести данную создаваемую или редактируемую запись(Article) */
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin_articles_show');
    }

    /** Remove the specified resource from storage.
    * @param  \App\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function destroy(Article $article) {
        $article->categories()->detach(); //1.при удалении определенной Article-записи в табл.`articles` мы сначала уничтожаем(открепляем) все привязанные к ней данные,- в частности Категории,к которым относилась эта запись
        $article->delete(); //2.удаляем теперь саму эту Article-запись по ее ID

        return redirect()->route('admin_articles_show');
    }

}  //__/class ArticleResourceController
