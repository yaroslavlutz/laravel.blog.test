<h2>{{ $title }}</h2>
<ol class="breadcrumb">
    <li> <a href="{{ route('admin_index') }}">{{ $parent }}</a> </li>
    <li class="active">{{ $active }}</li> <!--наша текущая страница-->
</ol>