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
    protected $fillable = ['parent_cat_id', 'title', 'alias', 'published', 'created_by', 'modified_by', 'created_at', 'updated_at'];

    public $timestamps = TRUE; 

    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . Carbon::now()->format('dmyHi'), '-');
    }

    /** Get children category 
    */
    public function children() {
        return $this->hasMany(self::class, 'parent_cat_id');
    }

    public function articles() {
        return $this->morphedByMany('App\Article', 'categoryable');
    }

    public function scopeLastCategories( $query, $count ) {
        return $query->orderBy('created_at', 'desc')
                ->take($count)
                ->get();
    }
}
