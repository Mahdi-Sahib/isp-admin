<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AddressHelper
 *
 * @mixin \Eloquent
 */
class AddressHelper extends Model
{
    public $table = 'address_helpers';

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }

}
