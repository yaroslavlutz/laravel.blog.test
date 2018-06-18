<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) { //Можно сразу к создаваемым ячейкам применять какие-то default-значения: $table->text('text')->default('some text..');
            //$table->engine = 'InnoDB'; //можно явно указать какой движок будет использоваться для табл.если не указывать, то использунтся движок,выбранный для БД вцелом
            $table->increments('id'); //это значит поле `id` INT AUTO_INCREMENT PPIMARY KEY
            $table->string('title',100); //varchar длинной 100 символов //заголовок(наименование)
            $table->string('alias',150)->unique(); //varchar длинной 150 символов, уникальное поле //псевдоним
            $table->text('description_short')->nullable(); //text для превью(короткого) описания статьи(новости)
            $table->text('description')->nullable(); //text статьи(новости) - полный
            $table->string('images',255)->nullable(); //varchar храним ссылки на изрбражение(я) для статьи(новости)
            $table->boolean('images_show')->nullable(); //boolean - флаг для того,чтобы проверять отображаем изображения для статьи(новости) или нет
            $table->string('meta_title',255)->nullable(); //varchar метаданные для статьи(новости)
            $table->string('meta_description',255)->nullable(); //varchar метаданные для статьи(новости)
            $table->string('meta_keyword',255)->nullable(); //varchar метаданные для статьи(новости)
            $table->boolean('published'); //`boolean` - опубликовать/не опубликовать
            $table->integer('viewed')->nullable(); //`integer` - ???
            $table->integer('created_by')->nullable(); //для того,чтобы определять кто создал Категорию - тут будет ID User
            $table->integer('modified_by')->nullable(); //для того,чтобы определять кто редактировал(изменил) Категорию - тут будет ID User
            $table->timestamps(); //для записи времени создания или изменения соответствующей записи в БД
        });
    }


    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
