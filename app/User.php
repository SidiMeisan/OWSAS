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
        'username', 'name', 'email', 'password', 'level',
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

    # Mengambil Level User
    public function getLevel()
    {
      return $this->level;
    }

    # Mengambil User Id 
    public function getID()
    {
      return $this->id;
    }

    # Memiliki Admin
    public function IsAdminUni(){
        return $this->has('App\UniAdmin');
    }

    # Memiliki Aplicant
    public function IsAplicant(){
        return $this->has('App\Applicant', 'users_id');
    }
}
