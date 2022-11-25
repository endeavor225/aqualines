<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    protected $guarded = [];

    public function carte()
    {
        return $this->belongsTo('App\Carte');
    }
}
