<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function recharges()
    {
        return $this->hasMany('App\Recharge');
    }

    public function transfert()
    {
        return $this->hasOne('App\Transfert');
    }

    public function bonus()
    {
        return $this->hasOne('App\Bonus');
    }
}
