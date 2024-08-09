<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;

    protected $fillable = [
        'symptom_id',
        'location',
        'indoor_environment',
        'occupation',
        'lifestyle',
    ];

    public function symptom(){
        return $this->belongsTo(Symptom::class);
    }
}
