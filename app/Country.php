<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = ['country_title', 'country_code'];

    // public function Distributor()
    // {
    //     return $this->belongsTo('App\Distributor');
    // }
}
