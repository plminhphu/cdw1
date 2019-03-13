<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'cities';
    public $timestamps = true;

    public static function get_city() {
        return City::all();
    }

    public static function get_first_city_join_country_by_id($id_city_from) {
        return City::join('countries', 'countries.id_country', '=', 'cities.id_country')
                        ->where('id_city', '=', $id_city_from)
                        ->first();
    }

}
