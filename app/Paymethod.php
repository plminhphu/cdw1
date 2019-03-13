<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymethod extends Model {

    protected $table = 'paymethods';
    public $timestamps = true;

    public static function get_paymethod() {
        return Paymethod::all();
    }

    public static function get_name_paymethod_by_id($id) {
        return Paymethod::where('id_paymethod', '=', $id)->first()->name_paymethod;
    }

}
