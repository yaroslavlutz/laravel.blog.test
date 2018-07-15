@extends('layouts.app')

@section('title', $category->title . " - DKA-DEVELOP")

@section('content')
    <div class="container">
        @forelse ( $articles as $article )
            <div class="row">
                <div class="col-sm-12">
                    <h2>
                        <a href="{{ route('article',$article->alias) }}">{{ $article->title }}</a>
                        <p>{!! $article->description_short !!}</p>
                    </h2>
                </div>
            </div>
        @empty
            <h2 class="center">Нет категорий!</h2>
        @endforelse

        <div class="pagination pull-right">{{ $articles->links() }}</div>
    </div>
@endsection