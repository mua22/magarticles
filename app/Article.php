<?php

namespace App;

use Carbon\Carbon;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Eloquence\Behaviours\Countable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements SluggableInterface
{
    use Countable;
    
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id',
        'category_id'
    ];
    
    protected $dates = [
        'published_at'
    ];
    
    public function countCaches()
    {
        return [Category::class, User::class];
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at','>=',Carbon::now());
    }

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
