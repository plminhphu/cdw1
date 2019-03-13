<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

    protected $table = 'bookings';
    public $timestamps = true;

    public static function get_all_booking_by_id_user($id_user) {
        return Booking::where('id_user', '=', $id_user)->orderBy('id_booking', 'DESC')->get();
    }

    public static function get_frist_booking_by_id($id_booking) {
        return Booking::where('id_booking', '=', $id_booking)->first();
    }

    public static function delete_booking($id_booking) {
        return Booking::where('id_booking', '=', $id_booking)->delete();
    }

    public static function create(array $data) {
        return Booking::insertGetId([
                    //save user and info booking
                    'id_user' => $data['id_user'],
                    'time_from' => $data['time_from'],
                    'flight_type' => $data['flight_type'],
                    'time_to' => $data['time_to'],
                    'id_flightlist_from' => $data['id_flightlist_from'],
                    'id_flightlist_to' => $data['id_flightlist_to'],
                    //save Passenger
                    'number_booking' => $data['number_booking'],
                    //save method info
                    'id_paymethod' => $data['id_paymethod'],
                    'cardnumber_paymethod' => $data['cardnumber_paymethod'],
                    'name_paymethod' => $data['name_paymethod'],
                    'ccv_paymethod' => $data['ccv_paymethod'],
                    //save contact info
                    'contact_fname' => $data['contact_fname'],
                    'contact_lname' => $data['contact_lname'],
                    'contact_phone' => $data['contact_phone'],
                    'contact_email' => $data['contact_email'],
                    //save total price
                    'total_price' => $data['total_price'],
        ]);
    }

}
