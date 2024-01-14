<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    public function sports(){
        return $this->belongsToMany(Sport::class,'classements')->withPivot("rang","performance");
    }
}
