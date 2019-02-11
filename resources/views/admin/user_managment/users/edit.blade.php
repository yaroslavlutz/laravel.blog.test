@extends('layouts.app_layout_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
        @slot('title') User Edit @endslot
        @slot('parent') Admin Dashboard @endslot
        @slot('active') User @endslot
    @endcomponent
    <hr/>

    <form class="form-horizontal" action="{{ route('admin_user_update', ['id' => $user->id]) }}" method="POST">
        {{ method_field('put') }}
        {{ csrf_field() }} {{--OR: <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

        {{-- Form include --}}
        @include('admin.user_managment.users.partials._form')
    </form>
</div>
@endsection
