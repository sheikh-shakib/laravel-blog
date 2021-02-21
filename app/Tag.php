<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guard=['created_at','updated_at','deleted_at'];
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tags');
    }


}
