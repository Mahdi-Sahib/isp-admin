<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefillCard extends Model
{
    public $table='refill_cards';

    public function user() {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }
}
