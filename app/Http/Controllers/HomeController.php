<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Flightclass;
use App\Flightlist;
use App\Transit;
use App\Airline;
use App\Airport;
use App\Paymethod;
use App\Booking;
use App\Passenger;
use App\User;
use Session;
use Auth;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome() {
        try {
            $city = City::get_city();
            $flightclass = Flightclass::get_flightclass();
            return view('home')->with(['city' => $city, 'flightclass' => $flightclass]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function postHome(Request $request) {
        try {
            $request->validate([
                'id_city_from' => 'required',
                'id_city_to' => 'required|different:id_city_from',
                'flight_time_from' => 'required',
                'flight_type' => 'required',
                'flight_number' => 'required',
                'filghtclass' => 'required',
            ]);
            Session::put('id_city_from', $request->input('id_city_from'));
            Session::put('id_city_to', $request->input('id_city_to'));
            Session::put('flight_time_from', $request->input('flight_time_from'));
            Session::put('flight_type', $request->input('flight_type'));
            Session::put('flight_time_to', $request->input('flight_time_to'));
            Session::put('flight_number', $request->input('flight_number'));
            Session::put('filghtclass', $request->input('filghtclass'));
            return redirect('/flight-list');
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getFlightList() {
        try {
            $id_city_from = Session::get('id_city_from');
            $id_city_to = Session::get('id_city_to');
            $city_from = City::get_first_city_join_country_by_id($id_city_from);
            $city_to = City::get_first_city_join_country_by_id($id_city_to);
            $flightlist = Flightlist::get_flightlist_join_city($id_city_from, $id_city_to);
            return view('flightlist')->with([
                        'city_from' => $city_from,
                        'city_to' => $city_to,
                        'flightlist' => $flightlist
            ]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getFlightDetail($id) {
        try {
            $flightlist = Flightlist::get_first_flightlist_by_id($id);
            $city_from = City::get_first_city_join_country_by_id($flightlist->id_city_from);
            $city_to = City::get_first_city_join_country_by_id($flightlist->id_city_to);
            $transit = Transit::get_transit_by_id($id);
            $flightclass = Flightclass::get_first_flightclass_by_id(Session::get('filghtclass'));
            $airlines = Airline::get_first_airline_by_id($flightlist->id_airline);
            $transitfrom = array();
            $transitto = array();
            foreach ($transit as $t) {
                $tf = Airport::get_first_airport_join_city_by_id($t->id_airports_from);
                array_push($transitfrom, $tf);
                $tt = Airport::get_first_airport_join_city_by_id($t->id_airports_to);
                array_push($transitto, $tt);
            }
            return view('flightdetail')->with([
                        'flightlist' => $flightlist,
                        'city_from' => $city_from,
                        'city_to' => $city_to,
                        'transit' => $transit,
                        'flightclass' => $flightclass,
                        'airlines' => $airlines,
                        'transitfrom' => $transitfrom,
                        'transitto' => $transitto,
            ]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getFlightChecked($id) {
        try {
            Session::put('filghtlist', $id);
            return redirect('/flight-book');
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getFlightBook() {
        try {
            $flightlist = Flightlist::get_first_flightlist_by_id(Session::get('filghtlist'));
            $city_from = City::get_first_city_join_country_by_id($flightlist->id_city_from);
            $city_to = City::get_first_city_join_country_by_id($flightlist->id_city_to);
            $transit = Transit::get_transit_by_id(Session::get('filghtlist'));
            $flightclass = Flightclass::get_first_flightclass_by_id(Session::get('filghtclass'));
            $airlines = Airline::get_first_airline_by_id($flightlist->id_airline);
            $transitfrom = array();
            $transitto = array();
            foreach ($transit as $t) {
                $tf = Airport::get_first_airport_join_city_by_id($t->id_airports_from);
                array_push($transitfrom, $tf);
                $tt = Airport::get_first_airport_join_city_by_id($t->id_airports_to);
                array_push($transitto, $tt);
            }
            $user = Auth::user();
            $paymethod = Paymethod::get_paymethod();
            return view('flightbook')->with([
                        'flightlist' => $flightlist,
                        'city_from' => $city_from,
                        'city_to' => $city_to,
                        'transit' => $transit,
                        'flightclass' => $flightclass,
                        'airlines' => $airlines,
                        'transitfrom' => $transitfrom,
                        'transitto' => $transitto,
                        'user' => $user,
                        'paymethod' => $paymethod,
            ]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function postFlightBook(Request $request) {
        try {
            $request->validate([
                'contact_fname' => 'required',
                'contact_lname' => 'required',
                'contact_phone' => 'required',
                'contact_email' => 'required',
                'paymethod' => 'required',
            ]);
            $flight_number = Session::get('flight_number');
            for ($i = 0; $i < $flight_number; $i++) {
                $request->validate([
                    'passenger_gender_' . $i => 'required',
                    'passenger_fname_' . $i => 'required',
                    'passenger_lname_' . $i => 'required',
                ]);
            }
            $flightlist = Flightlist::get_first_flightlist_by_id(Session::get('filghtlist'));
            $totalprice = $flight_number * $flightlist->price;
            $flight_time_to = null;
            $filghtlist = null;
            if (Session::get('flight_type') == "return") {
                $flight_time_to = Session::get('flight_time_to');
                $filghtlist = Session::get('filghtlist');
            }
            $data_booking = [
                //save user and info booking
                'id_user' => Auth::user()->id,
                'time_from' => Session::get('flight_time_from'),
                'flight_type' => Session::get('flight_type'),
                'time_to' => $flight_time_to,
                'id_flightlist_from' => Session::get('filghtlist'),
                'id_flightlist_to' => $filghtlist,
                //save Passenger
                'number_booking' => $flight_number,
                //save method info
                'id_paymethod' => $request->input('paymethod'),
                'cardnumber_paymethod' => $request->input('cardnumber_paymethod'),
                'name_paymethod' => $request->input('name_paymethod'),
                'ccv_paymethod' => $request->input('ccv_paymethod'),
                //save contact info
                'contact_fname' => $request->input('contact_fname'),
                'contact_lname' => $request->input('contact_lname'),
                'contact_phone' => $request->input('contact_phone'),
                'contact_email' => $request->input('contact_email'),
                //save total price
                'total_price' => $totalprice
            ];
            $id_booking = Booking::create($data_booking);
            if ($id_booking > 0) {
                for ($i = 0; $i < $flight_number; $i++) {
                    $data_passenger = [
                        'id_booking' => $id_booking,
                        'fname_passenger' => $request->input('passenger_fname_' . $i),
                        'lname_passenger' => $request->input('passenger_lname_' . $i),
                        'gender_passenger' => $request->input('passenger_gender_' . $i),
                    ];
                    Passenger::create($data_passenger);
                }
            }
            return redirect()->back();
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getProfile() {
        try {
            $user = Auth::user();
            return view('auth.profile')->with(['user' => $user]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function postProfile(Request $request) {
        try {
            $request->validate([
                'email' => 'required',
                'name' => 'required',
                'phone' => 'required',
            ]);
            User::set_profile($request->email, $request->name, $request->phone);
            if (isset($request->password)) {
                $request->validate([
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                    'password_confirmation' => 'same:password',
                ]);
                User::repassword($request->password);
            }
            return redirect()->back();
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getFlights() {
        try {
            $booking = Booking::get_all_booking_by_id_user(Auth::user()->id);
            $flightlistfrom = array();
            $flightlistto = array();
            foreach ($booking as $b) {
                $flf = Flightlist::get_first_flightlist_by_id($b->id_flightlist_from);
                array_push($flightlistfrom, $flf);
                $flt = Flightlist::get_first_flightlist_by_id($b->id_flightlist_to);
                array_push($flightlistto, $flt);
            }
            return view('flights')->with([
                        'booking' => $booking,
                        'flightlistfrom' => $flightlistfrom,
                        'flightlistto' => $flightlistto,
            ]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getFlightDetailBooking($id) {
        try {
            $booking = Booking::get_frist_booking_by_id($id);
            $passenger = Passenger::get_all_passenger_by_id_booking($booking->id_booking);
            $paymethod = Paymethod::get_name_paymethod_by_id($booking->id_paymethod);
            $flightlistfrom = Flightlist::get_first_flightlist_by_id($booking->id_flightlist_from);
            $flightlistto = Flightlist::get_first_flightlist_by_id($booking->id_flightlist_to);
            $transit = Transit::get_transit_by_id($booking->id_flightlist_from);
            $transitfrom = array();
            $transitto = array();
            foreach ($transit as $t) {
                $tf = Airport::get_first_airport_join_city_by_id($t->id_airports_from);
                array_push($transitfrom, $tf);
                $tt = Airport::get_first_airport_join_city_by_id($t->id_airports_to);
                array_push($transitto, $tt);
            }
            return view('flightdetailbooking')->with([
                        'booking' => $booking,
                        'passenger' => $passenger,
                        'paymethod' => $paymethod,
                        'flightlistfrom' => $flightlistfrom,
                        'flightlistto' => $flightlistto,
                        'transit' => $transit,
                        'transitfrom' => $transitfrom,
                        'transitto' => $transitto,
            ]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getCancleBooking($id) {
        try {
            $check = true;
            $passengers = Passenger::get_all_passenger_by_id_booking($id);
            foreach ($passengers as $p) {
                if (!Passenger::delete_passenger($p->id_passenger)) {
                    $check = false;
                }
            }
            if (!Booking::delete_booking($id)) {
                $check = false;
            }
            if ($check == true) {
                return redirect('flights');
            }
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function getEditPassenger($id) {
        try {
            $passenger = Passenger::get_first_passenger($id);
            return view('editpassenger')->with([
                        'passenger' => $passenger,
            ]);
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

    public function postEditPassenger(Request $request) {
        try {
            $request->validate([
                'gender_passenger' => 'required|max:5',
                'fname_passenger' => 'required|max:255',
                'lname_passenger' => 'required|max:255',
            ]);
            $id_passenger = $request->input('id_passenger');
            $gender_passenger = $request->input('gender_passenger');
            $fname_passenger = $request->input('fname_passenger');
            $lname_passenger = $request->input('lname_passenger');
            $passenger = Passenger::update_passenger($id_passenger, $gender_passenger, $fname_passenger, $lname_passenger);
            if($passenger){
                return redirect()->back();
            }
        } catch (Exception $ex) {
            echo 'ERR: ' . $ex;
            exit;
        }
    }

}
