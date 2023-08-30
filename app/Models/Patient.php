<?php

namespace App\Models;

use App\Models\Medecin;
use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $guarded=[];
    function medecin(){
        return $this->belongsTo(Medecin::class);
    }

    function consultations (){
        return $this->hasMany(Consultation::class);
    }
}
