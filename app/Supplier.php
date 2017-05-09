<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table='suppliers';

    public function user() {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function BalanceRecharge() {
        return $this->hasMany('App\BalanceRecharge');
    }

    public function userCreated(){
        return $this->belongsTo('App\User','created_by','id');
    }

    public function userUpdated(){
        return $this->belongsTo('App\User','updated_by','id');
    }
}
