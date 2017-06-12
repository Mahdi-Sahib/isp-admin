<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    public $table = 'towers';

    public function Broadcast() {
        return $this->hasMany('App\Broadcast');
    }

    public function BroadcastCount() {
        return $this->hasMany('App\Broadcast')->count();
    }

    public function TowerIp() {
        return $this->hasMany('App\TowerIp');
    }

    public function TowerIpCount() {
        return $this->hasMany('App\TowerIp')->count();
    }

    public function TowerLink() {
        return $this->hasMany('App\TowerLink');
    }

    public function TowerLinkCount() {
        return $this->hasMany('App\TowerLink')->count();
    }

    public function towerticket() {
        return $this->hasMany('App\TowerTicket');
    }

    public function TowerTicketCount() {
        return $this->hasMany('App\TowerTicket')->where('status','1')->count();
    }

    public function user() {
        return $this->belongsTo('App\User') ;
    }


}
