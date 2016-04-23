<?php

namespace App;

use Eloquence\Behaviours\Countable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Countable;
    public function countCaches() {
        return [Article::class];
    }
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
