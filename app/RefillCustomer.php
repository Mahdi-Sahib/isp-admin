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

    public function customer() {
        return $this->belongsTo('App\Customer','customer_id','id');
    }

    public function totalUnpaid(){
        return $this->hasMany('App\RefillCustomer')->where('payment_status','=', 1)->pluck('amount_paid')->sum();
    }

}
