@extends('blade_template')

@section('title','労働時間計測')
@section('css','/count.css')

@section('top')
    <div class="time-wrapper">
        <p class="count_work_time" id="count_up">00:00:00</p>
    </div>
@endsection

@section('middle')
        <div class="count_ball-wrapper">
            <div class="ball"></div>
            <div class="shadow"></div>
        </div>
@endsection

@section('bottom')
        <div class="stop"><button onclick="workEnd()">STOP</button></div>
        <script>
            getCountInfo();
        </script>
@endsection