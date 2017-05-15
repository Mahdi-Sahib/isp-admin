<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefillCustomer extends Model
{
    public $table="refill_customers";

    public function user() {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function card() {
        return $this->belongsTo('App\RefillCard','refill_card_id','id');
    }


}
