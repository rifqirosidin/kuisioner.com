<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FormElement extends Model
{
    protected $guarded = [];

    public function elementType()
    {
        return $this->belongsTo(ElementType::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function listOptions()
    {
        return $this->hasMany(ListOption::class);
    }

    public function multiselect()
    {
        return $this->hasMany(Multiselect::class);
    }


}
