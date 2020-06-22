<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->hasOne(Form::class);
    }

    public function getCreatedAtFormatAttribute()
    {
        return Carbon::parse($this->created_at)->format('D, d M Y');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
