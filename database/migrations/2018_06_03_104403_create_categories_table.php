<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) { //Можно сразу к создаваемым ячейкам применять какие-то default-значения: $table->text('text')->default('some text..');
            //$table->engine = 'InnoDB'; //можно явно указать какой движок будет использоваться для табл.если не указывать, то использунтся движок,выбранный для БД вцелом
            $table->increments('id'); //это значит поле `id` INT AUTO_INCREMENT PPIMARY KEY
            $table->integer('parent_cat_id')->default(0); //это ID родительской категории если у нас есть подкатегория(ии). Зн-е по-умолчанию  = нуль
            $table->string('title',100); //varchar длинной 100 символов //заголовок(наименование) категории
            $table->string('alias',150)->unique(); //varchar длинной 150 символов, уникальное поле //псевдоним для категории(slug) - ее alias(название)
            $table->tinyInteger('published'); //`tinyInteger` - поле с целыми числами от 0 до 255
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
        Schema::dropIfExists('categories');
    }
}
