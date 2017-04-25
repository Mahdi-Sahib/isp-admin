<?php

namespace App;

use App\Http\Controllers\CustomerTicketController;
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

    public function customerticket() {
        return $this->hasMany(CustomerTicketController::class);
    }
}
