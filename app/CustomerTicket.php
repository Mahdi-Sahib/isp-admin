<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerTicket extends Model
{

    public $table="customer_tickets";

    public function customer() {
        return $this->belongsTo('App\Customer') ;
    }

    public function user() {
        return $this->belongsTo('App\User','created_by','id');
    }

}
