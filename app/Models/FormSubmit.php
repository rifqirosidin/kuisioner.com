<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FormSubmit extends Model
{
    protected $guarded = [];

    public function submitByUser()
    {
        return $this->belongsTo(User::class, 'submit_by_user_id');
    }


}
