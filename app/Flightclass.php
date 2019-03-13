<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flightclass extends Model {

    protected $table = 'flightclasses';
    public $timestamps = true;

    public static function get_flightclass() {
        return Flightclass::all();
    }

    public static function get_first_flightclass_by_id($id) {
        return Flightclass::where('id_flightclass', $id)->first();
    }

}
