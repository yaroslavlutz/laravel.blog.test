@extends('layouts.app_layout_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') User List @endslot
            @slot('parent') Admin Dashboard @endslot
            @slot('active') Users @endslot
        @endcomponent
        <hr>

        <a href="{{ route('admin_user_create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create New User</a>

        <table class="table table-striped">
            <thead>
            <th class="text-center">Name</th>
            <th class="text-center">E-mail</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin_user_edit', ['id' => $user->id]) }}" type="btn" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                    </td>
                    <td class="text-center">
                        <form class="form-horizontal" name="admin_delete_article"
                              onsubmit="if( confirm('Delete?!') ){ return true }else{ return false }"
                              action="{{ route('admin_user_destroy', ['id' => $user->id]) }}" method="post" novalidate>
                              {{ method_field('delete') }}
                              {{ csrf_field() }} {{--OR: <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash-o"></i> </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>No data available</h2></td>
                </tr>
            @endforelse
            </tbody>

            <!--Paginations-->
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $users->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
            <!--Paginations-->
        </table>

    </div>

@endsection
