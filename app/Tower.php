<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    public $table = 'towers';

    public function Broadcast() {
        return $this->hasMany('App\Broadcast');
    }

    public function TowerIp() {
        return $this->hasMany('App\TowerIp');
    }

    public function TowerLink() {
        return $this->hasMany('App\TowerLink');
    }

    public function towerticket() {
        return $this->hasMany('App\TowerTicket');
    }

    public function AddressHelper() {
        return $this->belongsTo('App\AddressHelper');
    }
}
