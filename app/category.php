<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';

    protected $fillable = array(
        'cat_name',
    );
}
