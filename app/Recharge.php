<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    protected $guarded = [];

    public function carte()
    {
        return $this->belongsTo('App\Carte');
    }

    public function gare()
    {
        return $this->belongsTo('App\Gare');
    }

    public function caisse()
    {
        return $this->belongsTo('App\Caisse');
    }
}
