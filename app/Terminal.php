<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $guarded = [];

    public function gare()
    {
        return $this->belongsTo('App\Gare');
    }

    public function voyage()
    {
        return $this->belongsTo('App\Voyage');
    }
}
