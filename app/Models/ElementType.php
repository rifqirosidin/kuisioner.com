<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementType extends Model
{
    protected $guarded = [];

    public function formElement()
    {
        return $this->hasMany(FormElement::class);
    }
}
