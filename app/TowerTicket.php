<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerTicket extends Model
{
    public $table="tower_tickets";

    public function towers() {
        return $this->belongsTo('App\Tower') ;
    }

    public function user() {
        return $this->belongsTo('App\User') ;
    }

    public function asesor()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

}
