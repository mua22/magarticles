<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustPermissionTrait;
use Zizaco\Entrust\Traits\EntrustRoleTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements SluggableInterface
{
    use SluggableTrait;
    //use EntrustUserTrait;
    //use EntrustPermissionTrait;
    use EntrustUserTrait;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
       return $this->hasMany('App\Article');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
