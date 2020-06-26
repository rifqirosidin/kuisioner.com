<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FormSubmit extends Model
{
    protected $guarded = [];
    protected $appends = ['total_responses'];

    public function submitByUser()
    {
        return $this->belongsTo(User::class, 'submit_by_user_id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function getTotalResponsesAttribute()
    {
        return $this->form()->count();
    }



}
