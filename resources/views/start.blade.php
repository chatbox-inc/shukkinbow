@extends('blade_template')

@section('title','勤務開始')
@section('css','/start.css')

@section('top')
    <p class="current_time" id="current"></p>
@endsection

@section('middle')
    <div class="radio-wrapper">
        <div class="radio">
            <div id="office_work">
                <p class="turnBoxButton office">OFFICE</p>
            </div>
            <div>
                <p class="office">OFFICE</p>
            </div>
        </div>
        <div class="radio">
            <div id="remote_work">
                <p class="turnBoxButton remote">REMOTE</p>
            </div>
            <div>
                <p class="remote">REMOTE</p>
            </div>
        </div>
    </div>
@endsection

@section('bottom')
    <div class="start">
        <button onclick="workStart()">START</button>
    </div>

    <script>
        document.body.onload = getCurrentTime;
    </script>
    <script type="text/javascript" src="/js/turnBox.js"></script>
@endsection