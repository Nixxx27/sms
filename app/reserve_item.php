<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\carbon;

class reserve_item extends Model
{ protected $table = 'reserve';
    protected $dates = ['date_reserve','date_expire'];

    protected $fillable = array(
        'id_num',
        'item_id',
        'name',
        'item_name',
        'quantity',
        'date_reserve',
        'date_expire',
        'serial',
        'property_num',
        'category',
        'condition'
    );

}
