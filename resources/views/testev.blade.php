@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div id="monitor"></div>
@stop

@push('css')

@push('js')
<script>
    $(function () {
        load();
    });
    var timeout = setInterval(load, 60000);

    function SetupAjax() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }



    function load() {
        SetupAjax();

        $.ajax({
            type: 'GET',
            url: '/tickers/ticker',
            success: function (data) {
                $('#monitor').html(data);
            }
        });
    }
</script>
