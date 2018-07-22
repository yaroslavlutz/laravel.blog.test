@extends('layouts.app_layout_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Article List @endslot
    @slot('parent') Admin Dashboard @endslot
    @slot('active') Articles @endslot
  @endcomponent

  <hr>

  <a href="{{ route('admin_article_create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create Article</a>

  <table class="table table-striped">
    <thead>
      <th class="text-center">Title</th>
      <th class="text-center">Published</th>
      <th class="text-center">Edit</th>
      <th class="text-center">Delete</th>
    </thead>
    <tbody>
      @forelse ($articles as $article)
        <tr>
          <td class="text-center">{{ $article->title }}</td>
          <td class="text-center">{{ $article->published }}</td>
          <td class="text-center">
            <a href="{{ route('admin_article_edit', ['id' => $article->id]) }}" type="btn" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
          </td>
          <td class="text-center">
            <form class="form-horizontal" name="admin_delete_article"
                  onsubmit="if( confirm('Delete?!') ){ return true }else{ return false }"
                  action="{{ route('admin_article_destroy', ['id' => $article->id]) }}" method="post" novalidate>
                  {{ method_field('delete') }} <!--OR: <input type="hidden" name="_method" value="DELETE">-->
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
          {{ $articles->links() }}
        </ul>
      </td>
    </tr>
    </tfoot>
    <!--Paginations-->
  </table>

</div>

@endsection