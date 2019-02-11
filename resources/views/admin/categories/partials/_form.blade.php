<label for="">STATUS:</label>
<select class="form-control" name="published">
    @if ( isset($category->id) ) {{--Обновление Категории--}}
        <option value="0" @if ( $category->published == 0 ) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ( $category->published == 1 ) selected="" @endif>Опубликовано</option>
    @else {{--Создание новой Категории--}}
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{ $category->title or "" }}" required>

<label for="">Alias</label>
<input class="form-control" type="text" name="alias" placeholder="Автоматическая генерация" value="{{ $category->alias or "" }}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="parent_cat_id">
    <option value="0">-- без родительской категории --</option>
    {{-- Categories include --}}
    @include('admin.categories.partials._categories', ['categories' => $categories])
</select>

<hr/>

<input class="btn btn-primary" type="submit" value="Done">
