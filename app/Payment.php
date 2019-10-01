<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payment extends Model
{
    protected $table = 'payment';
    public $primaryKey = 'id';

    public $timestamps = true;



    public function userData(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
