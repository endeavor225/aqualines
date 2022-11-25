<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    protected $guarded = [];

    public function gare()
    {
        return $this->belongsTo('App\Gare');
    }

    public function recharges()
    {
        return $this->hasMany('App\Recharge');
    }
}
