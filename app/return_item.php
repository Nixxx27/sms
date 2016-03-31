<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\carbon;

class return_item extends Model
{
    protected $table = 'return';
    protected $dates = ['date_borrow','date_return'];

    protected $fillable = array(
        'id_num',
        'item_id',
        'name',
        'item_name',
        'quantity',
        'date_borrow',
        'date_return',
        'serial',
        'property_num',
        'category',
        'condition'
    );

    public function setDateBorrowAttribute($date)
    {
        $this->attributes['date_borrow'] = Carbon::parse($date);
    }

    public function setDateReturnAttribute($date)
    {
        $this->attributes['date_return'] = Carbon::parse($date);
    }
}
