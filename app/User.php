<?php

namespace App;

use App\Models\Balance;
use App\Models\Form;
use App\Models\FormSubmit;
use App\Models\Payment;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public static $TABLE_NAME = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','gender','birthday','avatar'
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

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function formSubmit()
    {
        return $this->hasMany(FormSubmit::class, 'submit_by_user_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }
}
