<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'friend_id'];
}
