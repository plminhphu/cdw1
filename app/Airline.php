<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model {

    protected $table = 'airlines';
    public $timestamps = true;

    public static function get_first_airline_by_id($id) {
        return Airline::where('id_airline', $id)->first();
    }

}
