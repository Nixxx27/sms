<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\carbon;

class borrow extends Model
{
    protected $table = 'borrow';
    protected $dates = ['date'];

    protected $fillable = array(
        'item_id',
        'id_num',
        'name',
        'item_name',
        'quantity',
        'date',
        'serial',
        'property_num',
        'category',
        'condition'
    );

    public function setdateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }
}
