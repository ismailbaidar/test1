<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medecin extends Model
{
    use HasFactory;
    function consultations(){
        return $this->hasManyThrough(Consultation::class,Patient::class);
    }

    function patients(){
        return $this->hasMany(Patient::class);
    }
}
