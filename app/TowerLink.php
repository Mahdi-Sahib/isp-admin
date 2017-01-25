<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerLink extends Model
{
    public $table="tower_links";

    public $fillable = [
        'id', 'tower_id', 'device_id', 'repeater_id','connection_types_id','channal_width','ssid','authentication','slave_ip','slave_antenna','slave_brand','master_ip','master_antenna','master_brand','created_by','updated_by','delete_by'
    ];

    public function Tower() {
        return $this->belongsTo('App\Tower') ;
    }

    public function ConnectionType(){
        return $this->hasMany('App\ConnectionType');
    }
}
