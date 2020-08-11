<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    public $fillable = ['title','parent_id'];

    public function childs()
    {
        return $this->hasmany('App\Attribute', 'parent_id', 'id');
    }
}
