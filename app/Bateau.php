<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model
{
    protected $guarded = [];

    public function gare()
    {
        return $this->belongsTo('App\Gare');
    }

    public function voyage()
    {
        return $this->hasOne('App\Voyage');
    }
}
