<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
