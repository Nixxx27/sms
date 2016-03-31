<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class description extends Model
{
    protected $table = 'item_desc';
    //protected $dates = ['action_due'];

    protected $fillable = array(
        'item_name',
    );
}
