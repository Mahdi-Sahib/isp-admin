<?php

namespace App;

use App\Http\Controllers\CustomerTicketController;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table="customers";

    public function towerName() {
        return $this->belongsTo('App\Tower','tower_id','id') ;
    }

    public function BroadcastSSID() {
        return $this->belongsTo('App\Broadcast','broadcast_id','id') ;
    }

    public function BroadcastMAC() {
        return $this->belongsTo('App\Broadcast','apmac_id','id') ;
    }

    public function Device(){
        return $this->belongsTo('App\Device','device_id','id');
    }

    public function connectionMmethod(){
        return $this->belongsTo('App\ConnectionType','connection_method','id');
    }

    public function wirelessType(){
        return $this->belongsTo('App\ConnectionType','wireless_type_id','id');
    }

    public function Info() {
        return $this->belongsTo('App\Info','address_1','id');
    }

    public function customerticket() {
        return $this->hasMany(CustomerTicketController::class);
    }

    public function userCreated(){
        return $this->belongsTo('App\User','created_by','id');
    }

    public function userUpdated(){
        return $this->belongsTo('App\User','updated_by','id');
    }
}
