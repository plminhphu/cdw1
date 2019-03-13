@extends('layouts.app')
@section('content')
<section>
    <h2>
        Flights
    </h2>

    <?php echo "<h3><strong>" . @$message . "</strong></h3>"; ?>
    <?php $i = 0; ?>
    @foreach($booking as $b)
    <article>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Contact:</strong>
                                <p>Name: <?php echo $b->contact_fname; ?></p>
                                <p>Phone: <?php echo $b->contact_phone; ?></p>
                                <p>Email: <?php echo $b->contact_email; ?></p>
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <strong>Passengers (x<?php echo $b->number_booking; ?>):</strong>
                                <strong>Flight:</strong>
                                <p>Type: <?php echo $b->flight_type; ?></p>
                                <p>
                                    <strong>From:</strong>
                                    <i>Time start: <?php echo $flightlistfrom[$i]->time_from; ?></i>
                                    <i>Time finish: <?php echo $flightlistfrom[$i]->time_to; ?></i>
                                    <i>Duration: <?php echo $flightlistfrom[$i]->duration; ?></i>
                                    <i>Price: <?php echo number_format($flightlistfrom[$i]->price, 2); ?></i>
                                    <a href="{{url('flight-detail-'.$b->id_flightlist_from)}}">. Detail flightlist From</a>
                                </p>
                                <?php if ($b->flight_type == 'return'): ?>
                                    <p>
                                        <strong>To:</strong>
                                        <i>Time start: <?php echo $flightlistto[$i]->time_from; ?></i>,
                                        <i>Time finish: <?php echo $flightlistto[$i]->time_to; ?></i>,
                                        <i>Duration: <?php echo $flightlistto[$i]->duration; ?></i>,
                                        <i>Price: <?php echo number_format($flightlistto[$i]->price, 2); ?></i>,
                                        <a href="{{url('flight-detail-'.$b->id_flightlist_to)}}">Detail flightlist To</a>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <p>Total price: <?php echo number_format($b->total_price, 2); ?></p>
                                <p><a href="{{url('detail-booking-'.$b->id_booking)}}">View Detail Flightlist</a></p>
                                <p><a href="{{url('cancle-booking-'.$b->id_booking)}}">Cancle Flightlist</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <?php $i++; ?>
    @endforeach
</section>
@endsection