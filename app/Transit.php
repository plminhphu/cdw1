<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transit extends Model {

    protected $table = 'transits';
    public $timestamps = true;

    public static function get_transit_by_id($id) {
        return Transit::where('id_flightlists', '=', $id)->get();
    }

}
