<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
class Category extends Model
{
    protected $table = 'categories';

    /** The attributes that are mass assignable.
     *  @var array
    */
    protected $fillable = ['parent_cat_id', 'title', 'alias', 'published', 'created_by', 'modified_by', 'created_at', 'updated_at']; //OR: protected $guarded = [];

    public $timestamps = TRUE; //FALSE

    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . Carbon::now()->format('dmyHi'), '-');
    }

    /** Get children category - будет брать именно дочерние(вложенные) Категории из табл.`categories`
    */
    public function children() {
        //именно поле `parent_cat_id` в табл.`categories` у нас есть флагом для идентификации родительская ли это категория или дочерняя и к какой Категории она тогда относится
        return $this->hasMany(self::class, 'parent_cat_id');
    }

    /** Polymorphic relation with articles
     */ /* Эта Модель,а значит и табл.`categories` связана с Моделью`Article` и значит с табл.`articles` ПОЛИМОРФНОЙ связью `Многие: ко Многим`.
          1-м парам.передаем связанную Модель,из кот.нам нужны данные в этой связи;
          2-й парам.'categoryable' -имя связующей табл.'categoryables'только в ед.числе
        Аналогично противоположный метод есть в Модели `Article` - см. `public function categories() {..}`*/
    public function articles() {
        return $this->morphedByMany('App\Article', 'categoryable');
    }


    /** (!!!) */
    /** Scope - статистика в Админке. Берем их базы последние записи
    */
    public function scopeLastCategories( $query, $count ) {
        return $query->orderBy('created_at', 'desc') //сортировка по дате создания в обратном порядке(т/е сначала идут последние добавленные записи
                ->take($count)
                ->get();
    }
}  //__/class Category
