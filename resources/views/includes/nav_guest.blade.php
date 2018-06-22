<?php

$url_starting_loc = null;
$url_starting_point_id = null;
$url_destination_loc = null;
$url_destination_point_id = null;
$url_starting_time = null;
$url_starting_time_2 = null;
$url_destination_time = null;
$url_destination_time_2 = null;

if(isset($_GET['starting_point'])){
    $url_starting_loc = $_GET['starting_point'];
}

if(isset($_GET['starting_point_id'])){
    $url_starting_point_id = $_GET['starting_point_id'];
}

if(isset($_GET['destination_point'])){
    $url_destination_loc = $_GET['destination_point'];
}

if(isset($_GET['destination_point_id'])){
    $url_destination_point_id = $_GET['destination_point_id'];
}

if(isset($_GET['starting_time'])){
    $url_starting_time = $_GET['starting_time'];
}

if(isset($_GET['starting_time_2'])){
    $url_starting_time_2 = $_GET['starting_time_2'];
}

if(isset($_GET['destination_time'])){
    $url_destination_time = $_GET['destination_time'];
}

if(isset($_GET['destination_time_2'])){
    $url_destination_time_2 = $_GET['destination_time_2'];
}



?>
<h4><b>Search Commutes</b></h4>
<br>
<form action="{{route('filter-commutes')}}" method="get">
    <div class="row">
        <div class="col-md-12" id="remote">
            <label>Starting Point</label><br>
            <input name="starting_point" type="text" class="typeahead form-control" id="starting_point" placeholder="Start typing starting location" value="{{ $url_starting_loc }}">
            <input name="starting_point_id" id="starting_point_id" type="text" class="typeahead" value="{{ $url_starting_point_id }}" hidden>
            <br>
            @if ($errors->has('starting_point'))
                <div class="alert alert-danger">{{ $errors->first('starting_point') }}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label>Start Date & Time</label>
            <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input class="form-control" name="starting_time" size="16" type="text" value="{{ $url_starting_time }}" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
            @if ($errors->has('starting_time'))
                <div class="alert alert-danger">{{ $errors->first('starting_time') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input class="form-control" name="starting_time_2" size="16" type="text" value="{{ $url_starting_time_2 }}" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
            @if ($errors->has('starting_time'))
                <div class="alert alert-danger">{{ $errors->first('starting_time') }}</div>
            @endif
        </div>
    </div>

    <div class="row">
        &nbsp;
    </div>

    <div class="row">
        <div class="col-md-12" id="remote">
            <label>Destination</label>
            <input name="destination_point" id="destination_point" type="text" class="typeahead form-control" placeholder="Start typing destination location" value="{{ $url_destination_loc }}">
            <input name="destination_point_id" id="destination_point_id" type="text" class="typeahead" value="{{ $url_destination_point_id }}" hidden>
            <br>
            @if ($errors->has('destination_point'))
                <div class="alert alert-danger">{{ $errors->first('destination_point') }}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label>Destination Date & Time</label>
            <div class="input-group date form_datetime"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input class="form-control" name="destination_time" size="16" type="text" value="{{ $url_destination_time }}" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"><i class="fa fa-calendar" aria-hidden="true"></i></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
            @if ($errors->has('destination_time'))
                <div class="alert alert-danger">{{ $errors->first('destination_time') }}</div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="input-group date form_datetime"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input class="form-control" name="destination_time_2" size="16" type="text" value="{{$url_destination_time_2 }}" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"><i class="fa fa-calendar" aria-hidden="true"></i></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
            @if ($errors->has('destination_time'))
                <div class="alert alert-danger">{{ $errors->first('destination_time') }}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary col-md-12">Filter</button>
        </div>
    </div>
</form>

<script>
    $( document ).ready(function() {
        var locations = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '{{url('search-locations?query=%aga')}}',
            remote: {
                url: '{{url('search-locations?query=%QUERY')}}',
                wildcard: '%QUERY'
            }
        });

        $('#remote .typeahead').typeahead(null, {
            name: 'starting_point',
            display: 'name',
            valueKey :'id',
            source: locations
        });

        $("#starting_point").on("typeahead:selected", function(e,datum) {
            $('#starting_point_id').val(datum.id);
            console.log(datum);
        });

        $("#destination_point").on("typeahead:selected", function(e,datum) {
            $('#destination_point_id').val(datum.id);
            console.log(datum);
        });
    });
</script>
