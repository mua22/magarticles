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

    public static function getSelectlist()
    {
        $categories = Category::with('descendants')->get(['id','name','node_depth']);
        $cats = array();
        //dd($categories);
        foreach($categories as $categor)
            $cats[$categor->id] = str_repeat(" | - ",(int)$categor->node_depth).$categor->name;
        return $cats;
    }

}
