<?php
namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryResourceController extends Controller
{
    /** Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */
    public function index(){
        $categories = Category::paginate(5);

        return view('admin.categories.index')->with( 'categories', $categories );
    }

    /** Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create(){
        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get();
        return view('admin.categories.create')
            ->with( 'category', [] )
            ->with( 'categories', $categories )
            ->with( 'delimiter', '' );
    }

    /** Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        Category::create( $request->all() );
        return redirect()->route('admin_categories_show');
    }


    /** Display the specified resource.
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */
    public function show(Category $category)
    {
        //
    }

    /** Show the form for editing the specified resource.
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */
    public function edit(Category $category)
    {
        $categories = Category::with('children')->where('parent_cat_id', '=', '0')->get();
        return view('admin.categories.edit')
            ->with( 'category', $category )
            ->with( 'categories', $categories )
            ->with( 'delimiter', '' );
    }

    /** Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Category $category)
    {
        $category->update( $request->except('alias') );
        return redirect()->route('admin_categories_show');
    }

    /** Remove the specified resource from storage.
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    *//
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin_categories_show');
    }

}
