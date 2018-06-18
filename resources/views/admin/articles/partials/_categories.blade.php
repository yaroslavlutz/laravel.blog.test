@foreach ($categories as $category)
    <!--Этот кусок кода единый для формы создания новой Article и обновления сущест.Article, поэтому тут проверка, - если есть ID Article, то значит на редактирование, нет ID Article - на создание новой Article -->
    <option value="{{ $category->id or "" }}"
        @isset($article->id) {{--Если существует ID Article, то мы редактируем Article, а не создаем--}}
            @foreach ($article->categories as $category_article)
                @if ($category->id == $category_article->id) selected="selected" @endif {{--Если Категория из общего списка Категорий привязана к Article, тогда мы ее показываем как выбранную для этой Article --}}
            @endforeach
        @endisset
    >
        {!! $delimiter or "" !!}{{ $category->title or "" }}
    </option>
    {{--реализация вывода бесконечной вложенности Категорий. Выход из цикла происходит,если у данной Категории нет вложенной(ых) Категории(й)--}}
    @if ( count($category->children) > 0 )
        @include('admin.articles.partials._categories', [
          'categories' => $category->children,
          'delimiter'  => ' - ' . $delimiter
        ])
    @endif
@endforeach