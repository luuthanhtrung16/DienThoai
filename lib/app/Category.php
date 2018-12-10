<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ="vp_categories";
    protected $primaryKey ="cate_id";
    protected $guarded =[];
}
