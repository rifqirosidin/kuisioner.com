<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListOption extends Model
{
    protected $guarded = [];

    public function formElement()
    {
        return $this->belongsTo(FormElement::class);
    }
}
