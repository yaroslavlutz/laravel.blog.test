Test accounts - Login / Password:
    1) admin (admin@mail.com) / 331429
    2) littus (littus@i.ua) / 654321
    3) fatHomer (homer@mail.us) / 123456
==================================================================================
git status
sudo git add .
sudo git commit -m 'Install CheckEditor and start use npm_run_dev with SASS'
git branch development
git status
git checkout development //master
git branch
git push
git push --set-upstream origin development

_______________________________________________ЭТАПЫ СОЗДАНИЯ ЭТОГО ПРИЛОЖЕНИЯ `laravel.blog.test`:*/
1) После установки приложения, создания базы данных(пустой), запуска комманды:
        php artisan migrate
        php artisan make:auth
   и реристрации 1-го пользователя- admin, - мы делаем административный раздел(Админку) для нашего блога и начнем с создания страницы Администратора `Dashboard`, на которой будет выводится главная инфа по блогу
   вцелом - это как информационная страница с статистикой:
   Для Админ-панели мы будем для файлов как View, так и файлов Контроллера использовать директорию [Admin], чтобы разделять frontend и backend.
   1.1) php artisan make:controller Admin/DashboardController
   1.2) в `routes/web.php` прописываем роут:
        Route::group( [ 'prefix'=>'admin', 'namespace' => 'Admin', 'middleware'=>['auth'] ], function() { .. });
   1.3) Делаем изменения в `app/Http/Controllers/Admin/DashboardController.php`
   1.4) Создаем папку `resources/views/admin` а в ней файл `resources/views/admin/dashboard.blade.php` и в нем подключаем layout и нужную разметку.
   1.5) Layout  для Админ-части у нас будет свои и мы его создаем - `resources/views/layouts/app_layout_admin.blade.php` и в него копируем содержимое изначального(коробочного) Layout -
        `resources/views/layouts/app.blade.php` и потом видоизменяем его и подключ./переподкл. в нем,что нужно.

2) Создадим модель `Category` вместе с начальной миграцией к ней - php artisan make:model Category --migration
    2.1) Создадим Контроллер для работы с вышесозданной Моделью он у нас будет типа ресурс и сразу укажем, каккая Модель будет связанна с этим Контроллером, а именно Модель `Category`:
            php artisan make:controller Admin/CategoryResourceController --resource --model=Category
    2.2) переходим в файл с миграцией,кот.у нас создался при создании Модели для работы с нею и,соответственно на создание табл.БД `categories` и дописываем там нужные поля.
         после чего запускаем на создание этой таблицы - php artisan migrate
    2.3) Прописываем для этого Контроллера маршрут в `routes/web.php`:
                Route::resource('/category', 'CategoryResourceController', [
                    //'names'=>[ 'index'=>'admin_categories_show', ... ]
                ]);
    2.4) Для View Категорий мы будем использовать отдельную папку и в ней создавать Views, поэтому создаем папку [categories] и в ней:
            `resources/views/admin/categories/index.blade`.
        В этом файле мы увидим такую штуку, как component:
                  @component('admin.components.breadcrumb')
                    @slot('title') Список категорий @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') Категории @endslot
                  @endcomponent
        Директивой `@slot` в таком Компоненте мы объявляем значение для переменных.  Сами переменные определены внутри самого компонента - см.`resources/views/admin/components/breadcrumb.blade.php`.
        Components - это расширение для шабонизатора blade и оно позволяет более динамично и рационально использовать повторяющиеся куски кода в шаблонах blade.
        Итак, теперь создадим файл с содержимым такого component. Для этого создаем папку [components] и в ней `resources/views/admin/components/breadcrumb.blade.php` и положим туда нужный код для
        этого компонента.


3) Наши категории будут пунктами меню, а они должны быть древовидными(вложеными).
    Категория может быть родительской и дочерней,т.е.относиться к какой-то родительской категории и так в древе.
    - Идем в Модель `app/Category.php` и там пишем метод `children()` кот.будет брать именно дочерние(вложенные) Категории из табл.`categories`.
    - Теперь переходим в Контроллер `app/Http/Controllers/Admin/CategoryResourceController.php` и создаем метод `create()` который будет нам выводить форму для создания новой Категории.
    Тут важный нюанс, - чтобы не плодить сущностей, у нас на создание новой Категории и ее редактирование будет одна единая форма, просто мы будем проверять какое именно действие нужно совершать:
    создание или редактирование по наличию в запросе параметра ID. Если он есть,- то значит нужно редактировать Категорию, если его нету - создаем новую!
    - Теперь создадим собственно вью `resources/views/admin/categories/create.blade.php`.
    Обращаем внимание мы инклюдим в эту вью непосредственно форму как дополнительную вложенную часть:
            {{-- Form include --}}
            @include('admin.categories.partials._form')
    Для этого,внутри папки с `resources/views/admin/categories` делаем папку [partials] и там создаем новую вью для универсальной формы `_form.blade.php`
    Именно эта вью с формой `resources/views/admin/categories/partials/_form.blade.php` и есть наша универсальная форма на создание новой Категории и ее редактирование, и мы ее таким образом подключаем тут в
    `resources/views/admin/categories/create.blade.php` и также сделаем в `resources/views/admin/categories/update.blade.php`.
    В этой форме,которая сама по себе уже вложенная есть еще одна вложенность с списком Категорий,благодаря которой мы получаем систему бесконечной вложенности и древовидность категорий, - мы подключаем
    файл `resources/views/admin/categories/partials/_categories.blade.php` в который передаем спискок категорий,вытягиваемых из табл.`categories`БД.

4) Список новостей(Блог) - Articles
- Создаем Модель `Article` и Контроллер к ней(ресурсного типа) -`ArticleResourceController` и папку [articles] в `resources/views/admin/` и там вью `resources/views/admin/articles/index.blade.php`.
- Создаем в `app/Http/Controllers/Admin/ArticleResourceController.php` методы `create()`, `store()`.
- Создаем вью для отображения формы создания новой новости(Article) - `resources/views/admin/articles/create.blade.php`. В ней мы,как и в случае с Categories, подключаем форму универсальную, которая будет и
    для создания новой Article и для редактирования сущ.Article - `resources/views/admin/articles/partials/_form.blade.php`:
            {{-- Form include --}}
            @include('admin.articles.partials._form')
    И опять же, как и в случае с Categories, в этой форме,которая сама по себе уже вложенная есть еще одна вложенность с списком Категорий,благодаря которой мы получаем систему бесконечной вложенности и
    древовидность категорий, - мы создаем и подключаем файл `resources/views/admin/articles/partials/_categories.blade.php` в который передаем спискок категорий,вытягиваемых из табл.`categories`БД.
    (!!!) Но это не тотже вложенный `_categories.blade.php` что для Categories, тут нам для Articles нужен будет немного другой,т/к/ есть отличия!

- Создаем миграцию на создания таблицы - связующей таблицы для реализации ПОЛИМОРФНЫХ Связей "Многие: ко Многим": php artisan make:migration create_categoryable_table --create=categoryables
  Потом переходим в эту миграцию и редактируем ее и после запускаем такую миграцию - php artisan migrate
- Теперь пропишем эту связь(ПОЛИМОРФНУЮ Связь "Многие: ко Многим") в Модели с Новостями (Модель `Article`).
- Нужно установить текстовый редактор "laravel-ckeditor" - https://github.com/UniSharp/laravel-ckeditor (или как я сам это делал вручную - проекты "landing.laravel.loc" и "corporate.laravel.loc"),
  и подключаем его в общем шаблоне `resources/views/layouts/app_layout_admin.blade.php`.
  После чего нужно прописать к каким элементам(элементам Формы и селектору в частности) мы хотим применить этот текстовый редактор. Поскольку тут мы не делали своего кастомного файла js и не работаем в нем,
  то делаем это в `resources/assets/js/app.js` и  там пишем:
        $( document ).ready(function() {
            CKEDITOR.replace( 'description_short' ); //`description_short` - селектор поля(textarea) к которому применяем текстовый редактор
            CKEDITOR.replace( 'description' ); //`description` - селектор поля(textarea) к которому применяем текстовый редактор
        });
  (!!)Установку "laravel-ckeditor" - смотри в файле `laravel-ckeditor.txt`
  (!!!) У меня,как обычно посыпались ошибки связанные с `npm` и сборкой пакетов JS в `Laravel-mix`, поэтому я поступил след.образом:
      1. в `HELPERS/Laravel/scss_in_Laravel/fix_npm_runDev_runnung.txt`
      2. Создал свой кастомный файл для JS - `public/js/main_admin.js` и его уже подключил в нужном шаблоне, а именно в `resources/views/layouts/app_layout_admin.blade.php`
      3. И в нем указал использование каких нужных полей в Форме нам нужно привязать `laravel-ckeditor` - см.`public/js/main_admin.js`

5) Scope - статистика в Админке для Категорий:
    5.1) идем в `app/Category.php` и добавляем:
            `public function articles() {..}` и
            `public function scopeLastCategories( $query, $count ) {..}`
    5.2) идем в `app/Http/Controllers/Admin/DashboardController.php` и дорабатываем этот Контроллер, а именно модифицируем метод `public function index() {..}`:
        Было:
            public function index() {
                return view('admin.dashboard');
            }
        Стало:
            public function index() {
                return view('admin.dashboard', [
                    'categories' => Category::lastCategories(5),
                ]);
            }
    5.3) Переходим во вью `resources/views/admin/dashboard.blade.php` где мы делаем непосредственно вывод этой информации о статистике по Categories

6) Scope - статистика в Админке для Articles: по аналогии с "Scope - статистика в Админке для Категорий", только подставляем методы связей именно для `Articles`
    - см.`app/Article.php` и метод `public function scopeLastArticles( $query, $count ) {..}`
    - см.`app/Http/Controllers/Admin/DashboardController.php`  и модифицируем метод `public function index() {..}`
    - см.`resources/views/admin/dashboard.blade.php` где мы делаем непосредственно вывод этой информации о статистике по Articles



php artisan make:provider BlogServiceProvider
идем в `app/Providers/BlogServiceProvider.php` и там прописываем метод  - `public function topMenu() {..}`
___добавить эту инфу в Helper и в файл `laravel_info.txt`
 + что пишем в Ф-ю boot()??



7) СИСТЕМА УПРАВЛЕНИЯ ПОЛЬЗОВАТЕЛЯМИ: