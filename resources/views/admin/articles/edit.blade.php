@extends('layouts.app_layout_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
        @slot('title') Article Edit @endslot
        @slot('parent') Admin Dashboard @endslot
        @slot('active') Articles List @endslot
    @endcomponent
    <hr/>

    <form class="form-horizontal" action="{{ route('admin_article_update', ['id' => $article->id]) }}" method="POST">
        {{ method_field('put') }} <!--OR: <input type="hidden" name="_method" value="PUT">-->
        {{ csrf_field() }} {{--OR: <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

        <input type="hidden" name="modified_by" value="{{ Auth::id() }}">

        {{-- Form include --}}
        @include('admin.articles.partials._form')
    </form>
</div>
@endsection