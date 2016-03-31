<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serial_num extends Model
{
    protected $table = 'serial';

     protected $fillable = array(
        'serial',
     );
}
