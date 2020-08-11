<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['customer_company', 'address_line1', 'address_line2', 'state',
                        //    'ftphost', 'ftpusername', 'ftppassword', 
                           'dbhost', 'dbuser', 'dbpassword', 'postcode', 'dbname', 'distributor_id','country_id', 'tag'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('customer_company', 'like', '%' .$searchTerm. '%')
                     ->orWhere('address_line1', 'like', '%' .$searchTerm. '%')
                     ->orWhere('address_line2', 'like', '%' .$searchTerm. '%')
                     ->orWhere('state', 'like', '%' .$searchTerm. '%')
                     ->orWhere('ftphost', 'like', '%' .$searchTerm. '%')
                     ->orWhere('ftpusername', 'like', '%' .$searchTerm. '%')
                     ->orWhere('ftppassword', 'like', '%' .$searchTerm. '%')
                     ->orWhere('ftpusername', 'like', '%' .$searchTerm. '%')
                     ->orWhere('dbhost', 'like', '%' .$searchTerm. '%')
                     ->orWhere('dbuser', 'like', '%' .$searchTerm. '%')
                     ->orWhere('dbpassword', 'like', '%' .$searchTerm. '%')
                     ->orWhere('dbname', 'like', '%' .$searchTerm. '%')
                     ->orWhere('tag', 'like', '%' .$searchTerm. '%');
    }
}
