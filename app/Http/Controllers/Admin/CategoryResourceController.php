<?php
namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryResourceController extends Controller
{
    /** Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */ /* Для отображения списка всех Категорий */
    public function index(){
        $categories = Category::paginate(5); //Методом `paginate` мы вернем коллекцию Категорий разбитую постранично на указанное число Категорий (10 Категорий на 1 страницу)

        return view('admin.categories.index')->with( 'categories', $categories );
    }

    /** Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */ /* Для отображения формы для создания новой Категории. Обработчик этого - метод `store()` */
    public function create(){
        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get(); //коллекция Категорий родительских(у которых поле `parent_cat_id` == 0)
        return view('admin.categories.create')
            ->with( 'category', [] )
            ->with( 'categories', $categories )
            ->with( 'delimiter', '' ); //символ(разделитель) для наглядности вложенности категорий (Родительские / дочерние)
    }

    /** Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */ /* Для создания(через POST) новой записи в таб.`categories`. Данные для создания новой категории в БД берутся из метода c формой `create` */
    public function store(Request $request)
    {
        Category::create( $request->all() );  //можно и через метод `save()`
        return redirect()->route('admin_categories_show');
    }


    /** Display the specified resource.
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */ /* Для отображения определенной(конкретной) записи из табл.БД */
    public function show(Category $category)
    {
        //
    }

    /** Show the form for editing the specified resource.
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */ /* Для отображения формы для редактирования существующей Категории. Обработчик этого - метод `update()` */
    public function edit(Category $category)
    {
        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get(); //коллекция Категорий родительских(у которых поле `parent_cat_id` == 0)
        return view('admin.categories.edit')
            ->with( 'category', $category )
            ->with( 'categories', $categories )
            ->with( 'delimiter', '' ); //символ(разделитель) для наглядности вложенности категорий (Родительские / дочерние)
    }

    /** Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */ /* Для обновления(через PUT) существующей записи в таб.`categories`. Данные для обновления такой категории в БД берутся из метода c формой `edit` */
    public function update(Request $request, Category $category)
    {
        $category->update( $request->except('alias') );
        return redirect()->route('admin_categories_show');
    }

    /** Remove the specified resource from storage.
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */ /* Для удаления(через DELETE) существующей записи в таб.`categories`. */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin_categories_show');
    }

}  //__/class CategoryResourceController
