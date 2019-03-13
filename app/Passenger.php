<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model {

    protected $table = 'passengers';
    public $timestamps = true;

    public static function get_first_passenger($id_passenger) {
        return Passenger::where('id_passenger', '=', $id_passenger)->first();
    }

    public static function get_all_passenger_by_id_booking($id_booking) {
        return Passenger::where('id_booking', '=', $id_booking)->orderBy('id_passenger', 'ASC')->get();
    }

    public static function delete_passenger($id_passenger) {
        return Passenger::where('id_passenger', '=', $id_passenger)->delete();
    }

    public static function update_passenger($id_passenger, $gender_passenger, $fname_passenger, $lname_passenger) {
        return Passenger::where('id_passenger', '=', $id_passenger)->update([
                    'gender_passenger' => $gender_passenger,
                    'fname_passenger' => $fname_passenger,
                    'lname_passenger' => $lname_passenger,
        ]);
    }

    public static function create(array $data) {
        $passenger = new Passenger();
        $passenger->id_booking = $data['id_booking'];
        $passenger->fname_passenger = $data['fname_passenger'];
        $passenger->lname_passenger = $data['lname_passenger'];
        $passenger->gender_passenger = $data['gender_passenger'];
        return $passenger->save();
    }

}
