<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function gare()
    {
        return $this->belongsTo('App\Gare');
    }

    public function carte()
    {
        return $this->belongsTo('App\Carte');
    }

    public function telephone()
    {
        return $this->belongsTo('App\Telephone');
    }
}
