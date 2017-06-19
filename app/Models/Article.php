<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    public $fillable = ['title','content','user_id'];

    protected $dates = ['deleted_at'];
}
