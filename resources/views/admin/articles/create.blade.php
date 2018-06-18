@extends('layouts.app_layout_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
        @slot('title') Article Create @endslot
        @slot('parent') Admin Dashboard @endslot
        @slot('active') Articles List @endslot
    @endcomponent
    <hr/>

    <form class="form-horizontal" action="{{ route('admin_article_store') }}" method="POST">
        {{ csrf_field() }} {{--OR: <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

        <input type="hidden" name="created_by" value="{{ Auth::id() }}">

        {{-- Form include --}}
        @include('admin.articles.partials._form')
    </form>
</div>
@endsection
