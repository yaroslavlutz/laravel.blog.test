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

    public function categories() {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function scopeLastArticles( $query, $count ) {
        return $query->orderBy('created_at', 'desc')
        ->take($count)
            ->get();
    }

}
