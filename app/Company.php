<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'm_company';

    public function t_user(){
        return $this->hasMany('App\t_user','company_id');
    }
}
