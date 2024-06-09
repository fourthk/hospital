<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'id_plan');
    }

}