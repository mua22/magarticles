<?php

namespace App;

use App\Traits\SluggableNodeTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Eloquence\Behaviours\Countable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model implements SluggableInterface
{
    use SluggableNodeTrait;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
    use NodeTrait;
    protected $fillable = ['name'];
    //
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    use Countable;

    public function countCaches() {
        return ['child_count' => [Category::class, 'parent_id', 'id']];
    }
}
