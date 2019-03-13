@extends('layouts.app')
@section('content')

<section>
    <h2>
        <?php echo @$city_from->name_country . " - " . @$city_from->name_city . " - (" . @$city_from->code_city . ")"; ?> 
        <i class="glyphicon glyphicon-arrow-right"></i>
        <?php echo @$city_to->name_country . " - " . @$city_to->name_city . " - (" . @$city_to->code_city . ")"; ?> 
    </h2>
    <article>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong><a href=""><?php echo @$flightlist->name; ?></a></strong></h4>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">From:</label>
                                <div><big class="time"><?php echo (new \DateTime(@$flightlist->time_from))->format("h:m"); ?></big></div>
                                <div><span class="place"><?php echo @$city_from->name_city; ?> (<?php echo @$city_from->code_city; ?>)</span></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">To:</label>
                                <div><big class="time"><?php echo (new \DateTime(@$flightlist->time_to))->format("h:m"); ?></big></div>
                                <div><span class="place"><?php echo @$city_to->name_city; ?> (<?php echo @$city_to->code_city; ?>)</span></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Duration:</label>
                                <div>
                                    <big class="time">
                                        <?php echo (new \DateTime(@$flightlist->duration))->format("H"); ?>h 
                                        <?php echo (new \DateTime(@$flightlist->duration))->format("m"); ?>m
                                    </big>
                                </div>
                                <div><strong class="text-danger"><?php echo @$flightlist->transit; ?> Transit</strong></div>
                            </div>
                            <div class="col-sm-3 text-right">
                                <h3 class="price text-danger"><strong><?php echo @number_format(@$flightlist->price, 2); ?></strong></h3>
                                <div>
                                    <a href="{{ url('/flight-checked-'.@$flightlist->id_flightlist)}}" class="btn btn-primary">Choose</a>
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection