<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guard=[];
    protected $fillable=['name','site_logo','facebook','twitter','reddit','instagram','email','about_site','copyright','address','phone'];
}
