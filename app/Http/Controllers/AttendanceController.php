<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;

class AttendanceController extends Controller{

    public $service;

    function __construct(AttendanceService $service){
        $this->service = $service;
    }

    public function start(){
        $this->service->initAttendanceId();   //勤務情報検索用　初期化
        return view('start');
    }

    public function count(){
        return view('count');
    }

    public function end(){
        $attendance_info = $this->service->getAttendanceInfo();
        return view('end',compact('attendance_info'));
    }


    public function startTime(Request $request) {
        $this->service->switchCountFlag();
        $this->service->setStartTime($request);
        $this->service->setLocation($request);
    }
    public function CountInfo(){
        $start_time = $this->service->getStartTime();
        return $start_time;
    }

    public function endtime(Request $request){
        $this->service->switchCountFlag();
        $this->service->setEndTime($request);
    }
}