<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medichine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function medichineCategory()
    {
        return $this->belongsTo(MedichineCategory::class, 'id_category');
    }
}
