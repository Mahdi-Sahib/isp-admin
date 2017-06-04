<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BalanceRecharge
 *
 * @property-read \App\Supplier $supplier
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
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
