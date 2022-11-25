<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $guarded = [];

    public function bateau()
    {
        return $this->belongsTo('App\Bateau');
    }
    
    public function terminals()
    {
        return $this->hasMany('App\Terminal');
    }

    public function gare()
    {
        return $this->belongsTo('App\Gare');
    }
}
