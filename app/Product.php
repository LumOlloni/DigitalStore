<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $table = 'product';
    public $primaryKey = 'id';

    public $timestamps = true;

    public function category(){

        return $this->belongsTo('App\Category');
    }
}
