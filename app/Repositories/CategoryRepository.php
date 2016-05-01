<?php namespace App\Repositories;


use App\Category;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

/**
 * Class TagsRepository
 * @package App\Repositories
 */
class CategoryRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Category';
    }

    public function getSelectlist()
    {
    	$categories = Category::with('descendants')->get(['id','name','node_depth']);
    	
    	$cats = array();
        foreach($categories as $categor) {
            $cats[$categor->id] = str_repeat(" | - ",(int)$categor->node_depth).$categor->name;
        }

        return $cats;
    }
}