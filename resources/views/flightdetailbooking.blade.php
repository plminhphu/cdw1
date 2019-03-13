@extends('layouts.app')
@section('content')
<section>
    <h2>
        Flight Detail Booking - <?php echo @$booking->id_booking; ?>
    </h2>
    <article>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong><a href=""></a></strong></h4>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Contact:</strong>
                                <p>Name: <?php echo @$booking->contact_fname; ?></p>
                                <p>Phone: <?php echo @$booking->contact_phone; ?></p>
                                <p>Email: <?php echo @$booking->contact_email; ?></p>
                            </div>
                            <div class="col-md-4">
                                <strong>Passengers (x<?php echo @$booking->number_booking; ?>):</strong>
                                <br>
                                <?php foreach ($passenger as $p): ?>
                                    <span>
                                        <?php echo $p->gender_passenger; ?>. 
                                        <?php echo $p->fname_passenger; ?> 
                                        <?php echo $p->lname_passenger; ?>
                                    </span> - 
                                    <a href="{{url('edit-passenger-'.$p->id_passenger)}}">Edit</a>
                                    <hr>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-4">
                                <strong>Flight:</strong>
                                <p>Type: <?php echo @$booking->flight_type; ?></p>
                                <p>
                                    <strong>From:</strong>
                                    <i>Time start: <?php echo $flightlistfrom->time_from; ?></i>
                                    <i>Time finish: <?php echo $flightlistfrom->time_to; ?></i>
                                    <i>Duration: <?php echo $flightlistfrom->duration; ?></i>
                                    <i>Price: <?php echo number_format($flightlistfrom->price, 2); ?></i>
                                    <a href="{{url('flight-detail-'.@$booking->id_flightlist_from)}}">Detail flightlist</a>
                                </p>
                                <?php if (@$booking->flight_type == 'return'): ?>
                                    <p>
                                        <strong>To:</strong>
                                        <i>Time start: <?php echo $flightlistto->time_from; ?></i>,
                                        <i>Time finish: <?php echo $flightlistto->time_to; ?></i>,
                                        <i>Duration: <?php echo $flightlistto->duration; ?></i>,
                                        <i>Price: <?php echo number_format($flightlistto->price, 2); ?></i>,
                                        <a href="{{url('flight-detail-'.@$booking->id_flightlist_to)}}">Detail flightlist</a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#flight-detail-tab">Flight Details</a></li>
                            <li><a data-toggle="tab" href="#flight-price-tab">Price Details</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="flight-detail-tab" class="tab-pane fade in active">
                                <ul class="list-group">
                                    <?php for ($i = 0; $i < count($transit); $i++): ?>
                                        <li class="list-group-item">
                                            <h5>
                                                <strong class="airline">{{@$airlines->name_airline}}</strong>
                                                <p><span class="flight-class">{{@$flightclass->name_flightclass}}</span></p>
                                            </h5>
                                            <div class="row">
                                                <div class="col-sm-4">
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
                                                <div class="col-sm-4">
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
                                                <div class="col-sm-3 text-right">
                                                    <label class="control-label">Duration:</label>
                                                    <div>
                                                        <strong class="time">
                                                            <?php echo (new \DateTime($transit[$i]->time_duration))->format("g"); ?>h 
                                                            <?php echo (new \DateTime($transit[$i]->time_duration))->format("i"); ?>m 
                                                        </strong>
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
                            <div id="flight-price-tab" class="tab-pane fade">
                                <h5>
                                    <strong class="airline">{{@$airlines->name_airline}}</strong>
                                    <p><span class="flight-class">{{@$flightclass->name_flightclass}}</span></p>
                                </h5>
                                <strong>Pay:</strong>
                                <p>Method: <?php echo $paymethod; ?></p>
                                <p>Card number: <?php echo @$booking->cardnumber_paymethod; ?></p>
                                <p>Name: <?php echo @$booking->name_paymethod; ?></p>
                                <p>CCV: <?php echo @$booking->ccv_paymethod; ?></p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="pull-left">
                                            <strong>Passengers Fare (x{{@Session::get('flight_number')}})</strong>
                                        </div>
                                        <?php $totalprice = @Session::get('flight_number') * @$flightlistfrom->price; ?>
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
                                            <strong><?php echo number_format(@$booking->total_price, 2); ?></strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
@endsection