<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function experience(){
        return $this->belongsTo(Experience::class);
    }

    public function legalFile(){
        return $this->belongsTo(LegalFile::class);
    }

    public function businessPlan(){
        return $this->belongsTo(BusinessPlan::class);
    }
}
