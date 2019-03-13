@extends('layouts.app')
@section('content')
<h2>Booking</h2>
<div class="row">
    <div class="col-md-8">
        <form action="{{route('postFlightBook')}}" method="post">
            @csrf
            <section>
                <h3>Contact Information</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="control-label">
                                    First Name:
                                </label>
                                <input type="text" name="contact_fname" value="<?php echo @$user->name; ?>" class="form-control" autofocus="true">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">
                                    Last Name:
                                </label>
                                <input type="text" name="contact_lname" value="<?php echo @$user->name; ?>" class="form-control" autofocus="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="control-label">
                                    Contact's Mobile phone number
                                </label>
                                <input type="tel" name="contact_phone" value="0<?php echo @$user->phone; ?>" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">
                                    Contact's email address
                                </label>
                                <input type="email" name="contact_email" value="<?php echo @$user->email; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-default">Clear all</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <h3>Passenger(s) Details</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php for ($i = 0; $i < @Session::get('flight_number'); $i++): ?>
                            <h4>Passenger #<?php echo $i + 1; ?></h4>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label class="control-label">Title:</label>
                                    <select name="passenger_gender_<?php echo $i; ?>" class="form-control" required="true">
                                        <option value="mr">Mr.</option>
                                        <option value="mrs">Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="control-label">First Name:</label>
                                    <input type="text" name="passenger_fname_<?php echo $i; ?>" class="form-control" required="true">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Last Name:</label>
                                    <input type="text" name="passenger_lname_<?php echo $i; ?>" class="form-control" required="true">
                                </div>
                            </div>
                            <hr>
                        <?php endfor; ?>
                    </div>
                </div>
            </section>
            <section>
                <h3>Price Details</h3>
                <h5>
                    <strong class="airline">{{@$airlines->name_airline}}</strong>
                    <p><span class="flight-class">{{@$flightclass->name_flightclass}}</span></p>
                </h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="pull-left">
                            <strong>Passengers Fare (x{{@Session::get('flight_number')}})</strong>
                        </div>
                        <?php $totalprice = @Session::get('flight_number') * @$flightlist->price; ?>
                        <div class="pull-right">
                            <strong><?php echo @number_format(@$totalprice, 2); ?></strong>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="pull-left">
                            <span>Tax</span>
                        </div>
                        <div class="pull-right">
                            <span>Included</span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item list-group-item-info">
                        <div class="pull-left">
                            <strong>You Pay</strong>
                        </div>
                        <div class="pull-right">
                            <strong><?php echo @number_format(@$totalprice, 2); ?></strong>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </section>
            <section>
                <h3>Payment</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">
                                Payment Method:
                            </label>
                            <select name="paymethod" class="form-control" required="true">
                                <?php foreach ($paymethod as $pmt): ?>
                                    <option value="<?php echo $pmt->id_paymethod; ?>"><?php echo $pmt->name_paymethod; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="credit_card">
                            <h4>Credit Card</h4>
                            <div class="form-group">
                                <label class="control-label">Card Number</label>
                                <input name="cardnumber_paymethod" type="number" maxlength="11" class="form-control" placeholder="Digit card number">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label class="control-label">Name on card:</label>
                                    <input name="name_paymethod" type="text" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label">CCV Code:</label>
                                    <input name="ccv_paymethod" type="number" maxlength="4" class="form-control" placeholder="Digit CCV">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        Continue to Booking
                    </button>
                </div>
            </section>
        </form>
    </div>
    <div class="col-md-4">
        <h3>Flights</h3>
        <aside>
            <article>
                <div>
                    <ul class="list-group">
                        <?php for ($i = 0; $i < count($transit); $i++): ?>
                            <li class="list-group-item">
                                <h5>
                                    <strong class="airline">{{@$airlines->name_airline}}</strong>
                                    <p><span class="flight-class">{{@$flightclass->name_flightclass}}</span></p>
                                </h5>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div><big class="time"><?php echo (new \DateTime($transit[$i]->time_from))->format("h:m"); ?></big></div>
                                                <div><small class="date"><?php echo (new \DateTime($transit[$i]->time_from))->format("jS F Y"); ?></small></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div><span class="place"><?php echo @$transitfrom[$i]->name_city; ?></span></div>
                                                <div><small class="airport"><?php echo @$transitfrom[$i]->name_airport; ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div><big class="time"><?php echo (new \DateTime($transit[$i]->time_to))->format("h:m"); ?></big></div>
                                                <div><small class="date"><?php echo (new \DateTime($transit[$i]->time_to))->format("jS F Y"); ?></small></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div><span class="place"><?php echo @$transitto[$i]->name_city; ?></span></div>
                                                <div><small class="airport"><?php echo @$transitto[$i]->name_airport; ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php if ($transit[$i]->time_transit != '00:00:00'): ?>
                                <li class="list-group-item list-group-item-warning">
                                    <ul>
                                        <li>Transit for 
                                            <?php echo (new \DateTime($transit[$i]->time_transit))->format("g"); ?>h 
                                            <?php echo (new \DateTime($transit[$i]->time_transit))->format("i"); ?>m 
                                            in 
                                            <?php echo @$transitto[$i]->name_city; ?>
                                            (<?php echo @$transitto[$i]->code_city; ?>)</li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </div>
            </article>
        </aside>
    </div>
</div>
@endsection