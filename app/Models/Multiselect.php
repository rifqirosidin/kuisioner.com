<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multiselect extends Model
{
    protected $guarded = [];

    public function formElement()
    {
        $this->belongsTo(FormElement::class);
    }
}
