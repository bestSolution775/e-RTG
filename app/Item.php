<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    public $fillable = ['sku', 'name', 'price', 'description', 'Size', 'Color','Pattern','Style', 'file_name', 'file_url'];
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('sku', 'like', '%' .$searchTerm. '%')
                     ->orWhere('name', 'like', '%' .$searchTerm. '%')
                     ->orWhere('price', 'like', '%' .$searchTerm. '%')
                     ->orWhere('description', 'like', '%' .$searchTerm. '%')
                     ->orWhere('Size', 'like', '%' .$searchTerm. '%')
                     ->orWhere('Color', 'like', '%' .$searchTerm. '%')
                     ->orWhere('Pattern', 'like', '%' .$searchTerm. '%')
                     ->orWhere('Style', 'like', '%' .$searchTerm. '%');
    }
}
