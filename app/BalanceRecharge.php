<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceRecharge extends Model
{
    public $table='balance_recharges';

    public function user() {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }

}
