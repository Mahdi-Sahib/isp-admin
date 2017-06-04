<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerLink extends Model
{
    public $table="tower_links";


    public function Tower() {
    return $this->belongsTo('App\Tower') ;
}

    public function ConnectionType(){
        return $this->belongsTo('App\ConnectionType');
    }


}
