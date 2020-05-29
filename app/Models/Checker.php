<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checker extends Model
{
    public function website(){
        return $this->belongsTo(Website::class,'website_id');
    }
}
