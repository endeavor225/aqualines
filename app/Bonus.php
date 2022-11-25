<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $guarded = [];

    public function carte()
    {
        return $this->belongsTo('App\Carte');
    }
}