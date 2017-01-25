<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table="customers";

    public function Tower() {
        return $this->belongsTo('App\Tower') ;
    }

    public function Broadcast(){
        return $this->belongsTo('App\Broadcast');
    }

    public function Device(){
        return $this->belongsTo('App\Device');
    }

    public function Info() {
        return $this->belongsTo('App\Info','address_1','id') ;
    }

    public function Ticket() {
        return $this->hasMany('App\Ticket','customer_id','id') ;
    }
}
