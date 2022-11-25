<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function cartes()
    {
        return $this->hasMany('App\Carte');
    }
}
