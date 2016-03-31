<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\carbon;

class employees extends Model
{
    protected $table = 'emp_db';
    //protected $dates = ['action_due'];

    protected $fillable = array(
        'name',
        'schedule_id',
        'idnum',
        'code',
        'rank',
        'emp_type',
    );
    /**
     * An employee has one schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedule()
    {
        return $this->belongsTo('App\schedule');
    }
}

