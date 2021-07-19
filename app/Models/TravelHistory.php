<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelHistory extends Model
{
    protected $fillable = ['user_id','res_name','date','in','out','establishment_id','establishment_name','establishment_address',];

    public function establishment(){
        return $this->belongsTo(Establishment::class);
    }

    public function resident(){
        return $this->belongsTo(User::class);
    }
}
