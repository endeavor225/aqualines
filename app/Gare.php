<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gare extends Model
{
    protected $guarded = [];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function bateaus()
    {
        return $this->hasMany('App\Bateau');
    }

    public function caisses()
    {
        return $this->hasMany('App\Caisse');
    }

    public function recharges()
    {
        return $this->hasMany('App\Recharge');
    }

    public function terminales()
    {
        return $this->hasMany('App\Terminal');
    }

    public function voyages()
    {
        return $this->hasMany('App\Voyage');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
