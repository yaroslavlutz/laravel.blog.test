@foreach ($categories as $category_list)
    <!--Этот кусок кода единый для формы создания новой Категории и обновления сущест.Категории, поэтому тут проверка, - если есть ID категории, то значит на редактирование, нет ID Категории - на создание новой Категории -->
    <option value="{{ $category_list->id or "" }}"
            @isset( $category->id )  {{--значит редактирование Категории--}}
            @if ( $category->parent_cat_id == $category_list->id ) selected=""  {{--если они совпадают,то значит это родит.Категория для данной перебираемой в цикле Категории--}}
            @endif

            @if ( $category->id == $category_list->id ) hidden="" {{--Также при редактировании,чтобы убрать из выбора родительских пунктов текущую Категорию, делаем проверку такую и если да, то скрываем--}}
            @endif
            @endisset
    >
        {!! $delimiter or "" !!}{{ $category_list->title or "" }}
    </option>
    {{--реализация вывода бесконечной вложенности Категорий. Выход из цикла происходит,если у данной Категории нет вложенной(ых) Категории(й)--}}
    @if ( count($category_list->children) > 0 )
        @include('admin.categories.partials._categories', [
          'categories' => $category_list->children,
          'delimiter'  => ' - ' . $delimiter
        ])
    @endif
@endforeach