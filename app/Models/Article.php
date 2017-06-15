<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = ['title','content','user_id'];
}
