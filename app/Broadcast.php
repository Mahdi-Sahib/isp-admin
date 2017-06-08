<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Broadcast
 *
 * @property-read \App\Device $Device
 * @property-read \App\Tower $Tower
 * @mixin \Eloquent
 */
class Broadcast extends Model
{

    public function Tower() {
        return $this->belongsTo('App\Tower') ;
    }

    public function device(){
        return $this->belongsTo('App\Device');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function broadcast_created_by()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function broadcast_updated_by()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }


}
