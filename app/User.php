<?php


namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'username','level','name', 'email', 'password',
=======
        'username', 'name', 'email', 'password', 'level',
>>>>>>> Controller
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD
    public function getLevel($value='')
    {
        return $this->level;
=======
    public function getLevel()
    {
      return $this->level;
    }

    public function IsAdminUni(){
        return $this->has('App\UniAdmin');
>>>>>>> Controller
    }
}
