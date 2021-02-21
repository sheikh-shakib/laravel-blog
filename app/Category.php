<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guard=['updated_at','created_at','deleted_at'];
    protected $fillable=['name'];
}
