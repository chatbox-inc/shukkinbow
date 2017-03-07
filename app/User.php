<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 't_user';

    public function t_attendancerecord(){
        return $this->hasMany('App\t_attendancerecord','user_id');
    }

    public function m_company(){
        return $this->belongsTo('App\m_company');
    }

}
