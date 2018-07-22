<label for="">STATUS:</label>
<!--Эта форма единая для создания новой Новости(Article) и обновления сущест.Новости(Article), поэтому тут проверка, - если есть ID Article,то значит на редактирование, нет ID Article - на создание новой -->
<select class="form-control" name="published">
    @if( isset($article->id ) ) {{--Обновление Article--}}
        <option value="0" @if ( $article->published == 0 ) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ( $article->published == 1 ) selected="" @endif>Опубликовано</option>
    @else {{--Создание новой Article--}}
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок Новости" value="{{ $article->title or "" }}" required>

<label for="">Alias</label>
<input class="form-control" type="text" name="alias" placeholder="Автоматическая генерация" value="{{ $article->alias or "" }}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple=""> <!-- name="categories[]" - это будет массив,т.к.Категория для определенной новости может быть присвоена не одна,а несколько-->

    {{-- Categories include --}}
    @include('admin.articles.partials._categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{ $article->description_short or "" }}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{ $article->description or "" }}</textarea>

<hr />

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{ $article->meta_title or "" }}">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{ $article->meta_description or "" }}">

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{ $article->meta_keyword or "" }}">
<hr/>

<input class="btn btn-primary" type="submit" value="Done">