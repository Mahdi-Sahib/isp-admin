<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerIp extends Model
{
    public $table = 'tower_ips';

    public $fillable = [
        'id', 'tower_id', 'tower_ip','created_by','updated_by','delete_by'
    ];
    public function Tower() {
        return $this->belongsTo('App\Tower') ;
    }


}
