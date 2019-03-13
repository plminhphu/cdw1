@extends('layouts.app')
@section('content')
<section>
    <h2>
        <?php echo @$city_from->name_country . " - " . @$city_from->name_city . " - (" . @$city_from->code_city . ")"; ?> 
        <i class="glyphicon glyphicon-arrow-right"></i>
        <?php echo @$city_to->name_country . " - " . @$city_to->name_city . " - (" . @$city_to->code_city . ")"; ?> 
    </h2>
    @foreach($flightlist as $fl)
    <article>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong><a href=""><?php echo @$fl->name_airline; ?></a></strong></h4>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">From:</label>
                                <div><big class="time"><?php echo @$fl->time_from; ?></big></div>
                                <div><span class="place"><?php echo @$city_from->name_city; ?> (<?php echo @$city_from->code_city; ?>)</span></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">To:</label>
                                <div><big class="time"><?php echo @$fl->time_to; ?></big></div>
                                <div><span class="place"><?php echo @$city_to->name_city; ?> (<?php echo @$city_to->code_city; ?>)</span></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Duration:</label>
                                <div><big class="time"><?php echo @$fl->duration; ?></big></div>
                                <div><strong class="text-danger"><?php echo @$fl->transit; ?> Transit</strong></div>
                            </div>
                            <div class="col-sm-3 text-right">
                                <h3 class="price text-danger"><strong><?php echo @number_format($fl->price, 2); ?></strong></h3>
                                <div>
                                    <a href="{{ url('/flight-detail-'.$fl->id_flightlist)}}" class="btn btn-link">See Detail</a>
                                    <a href="{{ url('/flight-checked-'.$fl->id_flightlist)}}" class="btn btn-primary">Choose</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    @endforeach
    <div class="text-center">
        <ul class="pagination">
            {{ $flightlist->fragment('foo')->links() }}
        </ul>
    </div>
</section>
@endsection