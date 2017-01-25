<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    public $table="broadcasts";

    public $fillable = [
        'id', 'tower_id', 'device_id', 'number_sign','name','ssid','ip', 'mac','channal','channal_width','direction', 'broadcasts_info','created_by','updated_by','delete_by'
    ];


    public function Tower() {
        return $this->belongsTo('App\Tower') ;
    }

    public function Device(){
        return $this->belongsTo('App\Device');
    }


}
