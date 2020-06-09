<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];

    public function formElements()
    {
        return $this->hasMany(FormElement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
