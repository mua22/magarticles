<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

/**
 * Class TagsRepository
 * @package App\Repositories
 */
class ArticlesRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Article';
    }

    public function create(array $data) {

    	$article = parent::create($data);
    	if($article !== null) {
    		$article->tags()->attach($data['tags']);
    	}
    	
    	return $article;
    }
}