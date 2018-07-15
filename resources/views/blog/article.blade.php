@extends('layouts.app')

@section('title', $article->title . " - DKA-DEVELOP")
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $article->title }}</h1>
                <p>{!! $article->description_short !!}</p>
            </div>
        </div>
    </div>
@endsection