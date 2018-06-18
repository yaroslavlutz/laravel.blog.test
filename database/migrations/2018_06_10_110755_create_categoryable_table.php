<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryableTable extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        Schema::create('categoryables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id'); //ID категории из табл.`categories`
            $table->integer('categoryable_id'); //ID поля таблицы связанной Модели (это ID Article из табл.`articles` )
            $table->string('categoryable_type'); //Указывается связанная Модель,в которой искать значение поля 'categoryable_id'
        });
    }

    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('categoryables');
    }
}
