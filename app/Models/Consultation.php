<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Operation;
use App\Models\Blocoperation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;
    protected $guarded=[];
    function patient(){
        return $this->belongsTo(Patient::class);
    }

    function operation(){
        return $this->hasOne(Operation::class);
    }

    
}
