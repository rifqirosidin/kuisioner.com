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

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function formSubmits()
    {
        return $this->hasMany(FormSubmit::class);
    }

}
