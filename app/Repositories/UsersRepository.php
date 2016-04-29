<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

/**
 * Class UsersRepository
 * @package App\Repositories
 */
class UsersRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return 'App\User';
    }
}