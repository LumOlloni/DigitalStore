<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Response;
use File;
use Intervention\Image\Facades\Image;

class User extends Authenticatable
{
    use Notifiable;
   


    protected $table = 'users';
    public $primaryKey = 'id';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username' , 'email', 'image', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'banned_until'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
      return $this->belongsToMany('App\Role');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }
    public function hasAnyRoles($roles){

        return null !== $this->roles()->whereIn('name' ,$roles )->first();
    }
    public function hasAnyRole($role){

        return null !== $this->roles()->where('name' ,$role )->first();
    }

    public function getSocialAvatar($file){

       $fileName = str_random(4). '.jpeg' ;

       $files = file_get_contents($file);
       
       Image::make($files)->resize(300,300)->save(public_path('images/imgUsers/'.$fileName));

       return  $fileName;
    }

   

}
