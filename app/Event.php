<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = array('start','end');
    protected $fillable = ['title','start','end','allDay'];
}
