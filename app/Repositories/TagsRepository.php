<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

/**
 * Class TagsRepository
 * @package App\Repositories
 */
class TagsRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Tag';
    }
}