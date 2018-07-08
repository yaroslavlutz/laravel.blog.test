@extends('layouts.app_layout_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p> <span class="label label-primary">Categories <span class="label label-success">{{ $count_categories }}</span> </span> </p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Materials <span class="label label-success">{{ $count_articles }}</span> </span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Visitors <span class="label label-success">0</span> </span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Today <span class="label label-success">0</span> </span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{ route('admin_category_create') }}">Create category</a>
                @foreach($categories as $category)
                    <a class="list-group-item" href="{{ route('admin_category_edit', ['id' => $category->id]) }}">
                        <h4 class="list-group-item-heading" style="color:darkblue;">{{ $category->title }}</h4>
                        <p class="list-group-item-text"> Кол-во записей в данной Категории: <b style="color:darkblue;">{{ $category->articles()->count() }}</b></p> <!--где `articles()` метод обратной Полиморфной связи с новостями/ См.`app/Category.php`-->
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{ route('admin_article_create') }}">Create Material</a>
                @foreach($articles as $article)
                    <a class="list-group-item" href="{{ route('admin_article_edit', ['id' => $article->id]) }}">
                        <h4 class="list-group-item-heading" style="color:darkblue;">{{ $article->title }}</h4>
                        <p class="list-group-item-text"> Отношение к Категориям: <b style="color:darkblue;">
                                {{ $article->categories()->pluck('title')->implode(', ') }}</b>
                        </p> <!--где `pluck()` метод кот.возвращает зн-е для ключа `title`,т.е.это наименование нашей Категории и `pluck()` возвращает именно массив,значит этот метод вернет название Категорий в массиве, и,
                                 если их несколько для данной Article-записи, мы будем выводить через запятую и тут для этого мы уже  используем метод разбивки массива - `implode()`
                             -->
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection