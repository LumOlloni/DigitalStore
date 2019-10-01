<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $primaryKey = 'id';

    public $timestamps = true;
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
