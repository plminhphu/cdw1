<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model {

    protected $table = 'airports';
    public $timestamps = true;

    public static function get_first_airport_join_city_by_id($id) {
        return Airport::join('cities', 'airports.id_city', 'cities.id_city')
                        ->where('id_airport', $id)
                        ->first();
    }

}
