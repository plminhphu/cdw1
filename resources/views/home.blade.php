@extends('layouts.app')
@section('content')

<section>
    <h3>Flight Booking</h3>
    @if (@Session::get('messages'))
    <div class="btn btn-success">
        <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
        {{@Session::get('messages')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="btn btn-danger">
        <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
        @foreach ($errors->all() as $error)
        {{ $error }} &#9824; 
        @endforeach
    </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="form" action="{{ route('postHome')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="form-heading">1. Flight Destination</h4>
                        <div class="form-group">
                            <label class="control-label">From: </label>
                            <select class="form-control" name="id_city_from" id="from" required="true">
                                <?php foreach (@$city as $c): ?>
                                    <?php if (@Session::get('id_city_from') == $c->id_city): ?>
                                        <option value="<?php echo @$c->id_city; ?>" selected="true"><?php echo @$c->name_city; ?> (<?php echo @$c->code_city; ?>)</option>
                                    <?php else: ?>
                                        <option value="<?php echo @$c->id_city; ?>"><?php echo @$c->name_city; ?> (<?php echo @$c->code_city; ?>)</option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>                             
                        </div>
                        <div class="form-group">
                            <label class="control-label">To: </label>
                            <select class="form-control" name="id_city_to" id="to" required="true">
                                <?php foreach (@$city as $c): ?>
                                    <?php if (@Session::get('id_city_to') == $c->id_city): ?>
                                        <option value="<?php echo @$c->id_city; ?>" selected="true"><?php echo @$c->name_city; ?> (<?php echo @$c->code_city; ?>)</option>
                                    <?php else: ?>
                                        <option value="<?php echo @$c->id_city; ?>"><?php echo @$c->name_city; ?> (<?php echo @$c->code_city; ?>)</option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>       
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="form-heading">2. Date of Flight</h4>
                        <div class="form-group">
                            <label class="control-label">Departure: </label>
                            <input name="flight_time_from" type="date" class="form-control" required="true" value="{{@Session::get('flight_time_from')}}">
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <?php if (@Session::get('flight_type') != "return"): ?>
                                    <label><input type="radio" name="flight_type" id="flight_one_way" checked="true" value="one-way">One Way</label>
                                    <label><input type="radio" name="flight_type" id="flight_return" value="return">Return</label>
                                    <script>
                                        $(document).ready(function () {
                                            document.getElementById("flight_time_to").style.display = "none";
                                        });
                                    </script>
                                <?php else: ?>
                                    <label><input type="radio" name="flight_type" id="flight_one_way" value="one-way">One Way</label>
                                    <label><input type="radio" name="flight_type" id="flight_return" checked="true" value="return">Return</label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group" id="flight_time_to">
                            <label class="control-label">Return: </label>
                            <input name="flight_time_to" type="date" class="form-control" value="{{@Session::get('flight_time_to')}}">
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#flight_return').click(function () {
                                document.getElementById("flight_time_to").style.display = "block";
                            });
                            $('#flight_one_way').click(function () {
                                document.getElementById("flight_time_to").style.display = "none";
                            });
                        });
                    </script>
                    <div class="col-sm-4">
                        <h4 class="form-heading">3. Search Flights</h4>
                        <div class="form-group">
                            <label class="control-label">Total Person: </label>
                            <select name="flight_number" class="form-control" required="true">
                                <?php
                                for ($i = 1; $i < 10; $i++):
                                    ?>
                                    <?php if (@Session::get('flight_number') == $i): ?>
                                        <option value="<?php echo $i; ?>" selected="true"><?php echo $i; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Flight Class: </label>
                            <select name="filghtclass" class="form-control" required="true">
                                <?php foreach (@$flightclass as $fc): ?>
                                    <?php if (@Session::get('filghtclass') == $fc->id_flightclass): ?>
                                        <option value="<?php echo $fc->id_flightclass; ?>" selected="true"><?php echo $fc->name_flightclass; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $fc->id_flightclass; ?>"><?php echo $fc->name_flightclass; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Search Flights</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection