@extends('blade_template')

@section('title','勤務終了')
@section('css','/end.css')

@section('top')
    <div class="time-wrapper">
        <p>開始時間- {{ $attendance_info->start_time }}</p>
        <p>終了時間 - {{ $attendance_info->end_time }}</p>
        <p>勤務時間 - {{ $attendance_info->working_time }}</p>
    </div>
@endsection

@section('bottom')
    <div class="end"><a href="/start">　</a></div>
@endsection