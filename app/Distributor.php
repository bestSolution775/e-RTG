<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    //
    protected $fillable = ['distributor_company', 'address_line1', 'address_line2', 'state', 'postcode', 'country_id'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('distributor_company', 'like', '%' .$searchTerm. '%')
                     ->orWhere('address_line1', 'like', '%' .$searchTerm. '%')
                     ->orWhere('address_line2', 'like', '%' .$searchTerm. '%')
                     ->orWhere('state', 'like', '%' .$searchTerm. '%')
                     ->orWhere('postcode', 'like', '%' .$searchTerm. '%')
                     ->orWhere('country_id', 'like', '%' .$searchTerm. '%');
    }
}
