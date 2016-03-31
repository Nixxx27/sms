<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'items';

    protected $fillable = array(
        'serial',
        'property_num',
        'item_desc',
        'category',
        'quantity',
        'condition',
        'status'
    );
}
