<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = TRUE; //FALSE

    /** The attributes that are mass assignable.
     *  @var array
    */
    protected $fillable = ['title', 'alias', 'description_short', 'description', 'images', 'images_show', 'meta_title', 'meta_description', 'meta_keyword', 'published', 'viewed', 'created_by', 'modified_by', 'created_at', 'updated_at'];

    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . Carbon::now()->format('dmyHi'), '-');
    }

    /** Polymorphic relation with categories
    */ /* Эта Модель,а значит и табл.`articles` связана с Моделью`Category` и значит с табл.`categories` ПОЛИМОРФНОЙ связью `Многие: ко Многим`.
          1-м парам.передаем связанную Модель,из кот.нам нужны данные в этой связи;
          2-й парам.'categoryable' -имя связующей табл.'categoryables'только в ед.числе
       Аналогично противоположный метод есть в Модели `Category` - см. `public function articles() {..}` */
    public function categories() {
        return $this->morphToMany('App\Category', 'categoryable');
    }


    /** (!!!) */
    /** Scope - статистика в Админке. Берем из базы последние записи
     */
    public function scopeLastArticles( $query, $count ) {
        return $query->orderBy('created_at', 'desc') //сортировка по дате создания в обратном порядке(т/е сначала идут последние добавленные записи
        ->take($count)
            ->get();
    }

} //__/class Article
