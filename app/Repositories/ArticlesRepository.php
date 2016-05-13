<?php namespace App\Repositories;

use App\Article;
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
    		$article->tags()->sync($data['tags']);
    	}
    	
    	return $article;
    }

    public function update(array $data, $id) {

        $article = Article::findOrFail($id);

        $tags = $data['tags'];
        unset($data['tags']);
        if($article) {
            $article->update($data);
            $article->tags()->sync($tags);
            return $article;
        }
    }
}