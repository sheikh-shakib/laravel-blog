<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guard=[];
    protected $fillable=['name','email','subject','message'];
}
