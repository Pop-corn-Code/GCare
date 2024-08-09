<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'symptom_name',
        'symptom_onset',
        'time',
        'symptom_type',
        'symptom_severity',
        'symptom_location',
        'symptom_description',
        'symptom_duration',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function trigger(){
        return $this->hasOne(Trigger::class);
    }

    public function environment(){
        return $this->hasOne(Environment::class);
    }
}
