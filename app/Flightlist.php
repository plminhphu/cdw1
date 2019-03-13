<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flightlist extends Model {

    protected $table = 'flightlists';
    public $timestamps = true;

    public static function get_flightlist_join_city($id_city_from, $id_city_to) {
        return Flightlist::join('airlines', function($join) {
                            $join->on('airlines.id_airline', '=', 'flightlists.id_airline');
                        })
                        ->where('id_city_from', $id_city_from)
                        ->where('id_city_to', $id_city_to)
                        ->orderBy('flightlists.id_flightlist', 'DESC')
                        ->paginate(3);
    }

    public static function get_first_flightlist_by_id($id) {
        return Flightlist::where('id_flightlist', $id)->first();
    }

}
