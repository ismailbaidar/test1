<?php

namespace App\Models;

use App\Models\Roles;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;
    protected $guarded=[];
    function role(){
        return $this->belongsTo(Roles::class);
    }
    function patients(){
        return $this->hasMany(Patient::class,);
    }

    function logs(){
        return $this->morphMany(Log::class,'loogable');
    }
}
