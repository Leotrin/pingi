<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function history(){
        return $this->hasMany(Checker::class,'website_id');
    }
    public function monthlyStats(){
        return $this->hasMany(Stat::class,'website_id')->where('month','!=',null);
    }
    public function dailyStats(){
        return $this->hasMany(Stat::class,'website_id')->where('month',null);
    }
}
