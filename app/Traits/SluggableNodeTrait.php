<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 4/20/2016
 * Time: 8:32 PM
 */

namespace App\Traits;


use Cviebrock\EloquentSluggable\SluggableTrait;

trait SluggableNodeTrait
{
    use SluggableTrait;
    public function sluggify($force = false)
    {
        if ($this->fireModelEvent('slugging') === false) {
            return $this;
        }

        if ($force || $this->needsSlugging()) {
            $source = $this->getSlugSource();
            $slug = $this->generateSlug($source);

            $slug = $this->validateSlug($slug);
            $slug = $this->makeSlugUnique($slug);

            $this->setSlug($slug);
            $this->setTreeSlug($slug);
            $this->fireModelEvent('slugged');
        }

        return $this;
    }

    protected function setTreeSlug($slug)
    {
        /*$config = $this->getSluggableConfig();
        $save_to = $config['save_to'];*/
        $parentId = $this->getAttribute('parent_id');
        if($parentId!=null)
        {

            $node = $this::find($parentId);
            $this->setAttribute("node_depth", $node->node_depth+1);
            $slug = $node->slug."/".$slug;
            foreach($node->getAncestors() as $ancestor)
            $slug = $ancestor->slug."/".$slug;
        }
        $this->setAttribute("tree_slug", $slug);
    }

    public static function findByTreeSlug($slug)
    {
        return self::whereTreeSlug($slug)->first();
    }
}