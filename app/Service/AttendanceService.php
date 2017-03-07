<?php
namespace App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Attendancerecord;

class AttendanceService
{

    public $user;
    public $attendance;

    function __construct(User $user, Attendancerecord $attendance){
        $this->user = $user;
        $this->attendance = $attendance;
    }

    public function setStartTime(Request $request) {
        $google_id = session()->get('google_id', []);
        $user = $this->user
            ->where('google_id', $google_id)
            ->first();

        $this->attendance->user_id = $user->id;
        $this->attendance->start_time = $request->get("start_time");
        $this->attendance->end_time = null;
        $this->attendance->save();

        //開始時刻を入れたレコードに終了時刻を入れるためのid
        $attendance_id = session()->get("attendance_id",[]);
        $attendance_id[] = $this->attendance->id;
        session()->put("attendance_id",$attendance_id);
    }

    public function setLocation(Request $request){
        if ($request->get("work_location") === "office"){
            $this->attendance->location_id = 1;
        }else{
            $this->attendance->location_id = 2;
        }
        $this->attendance->save();
    }

    public function getStartTime(){
        $attendance_id = session()->get('attendance_id',[]);

        $attendance_info = $this->attendance
            ->where('id',$attendance_id)
            ->first();

        $start_time = $attendance_info->start_time;

        return $start_time;
    }

    public function setEndTime(Request $request) {
        $attendance_id = session()->get('attendance_id',[]);

        $this->attendance
            ->where('id',$attendance_id)
            ->update(['end_time' => $request->get('end_time')]);
    }

    public function getAttendanceInfo(){
        $attendance_id = session()->get('attendance_id',[]);

        $attendance_info = $this->attendance
            ->where('id',$attendance_id)
            ->first();

        $start_time = strtotime($attendance_info->start_time);
        $end_time = strtotime($attendance_info->end_time);
        $working_time = $end_time - $start_time;

        $attendance_info["start_time"] = date("H:i:s",$start_time);
        $attendance_info["end_time"] = date("H:i:s",$end_time);
        $attendance_info["working_time"] = date("H:i:s",$working_time);

        $this->initAttendanceId();   //start middleware用　初期化

        return $attendance_info;
    }

    //計測中かのフラグ 切り替え
    public function switchCountFlag(){
        $count_flag = session()->get("count_flag",[]);
        if($count_flag == true){
            $count_flag = false;
        }else{
            $count_flag = true;
        }
        session()->forget("count_flag");
        session()->put("count_flag",$count_flag);
    }

    public function initAttendanceId(){
        session()->forget("attendance_id");
        session()->get("attendance_id",[]);
    }
}