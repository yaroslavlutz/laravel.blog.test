@extends('layouts.app_layout_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
        @slot('title') Category Create @endslot
        @slot('parent') Admin Dashboard @endslot
        @slot('active') Categories @endslot
    @endcomponent
    <hr/>

    <form class="form-horizontal" action="{{ route('admin_category_store') }}" method="POST">
        {{ csrf_field() }} {{--OR: <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

        {{-- Form include --}}
        @include('admin.categories.partials._form')
    </form>
</div>
@endsection
