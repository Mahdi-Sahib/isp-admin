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

    public function ticket() {
        return $this->hasMany('App\CustomerTicket');
    }

    public function openTicketCount() {
        return $this->hasMany('App\CustomerTicket')->where('status','=', 1)->count();
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

    public function unpaidCount(){
        return $this->hasMany('App\RefillCustomer')->where('payment_status','=', 1)->count();
    }

    public function refillCount(){
        return $this->hasMany('App\RefillCustomer')->pluck('id')->count();
    }

    //  ======================== start
    public function totalUnpaidSum(){
        return $this->hasMany('App\RefillCustomer')->where('payment_status','=', 1)->pluck('card_price')->sum();
    }

    public function unpaidSum(){
        return $this->hasMany('App\RefillCustomer')->where('payment_status','=', 1)->pluck('amount_paid')->sum();
    }

    public function getUnpaid(){
        return $this->totalUnpaidSum() - $this->unpaidSum();
    }
    // ======================== end

    public function remainingAmountOnCard(){
        return $this->hasMany('App\RefillCustomer')->where('payment_status','=', 1)->pluck('amount_paid');
    }



}
