<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['birth_date'];

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }

    public function bloodtype()
    {
        return $this->hasOne(BloodType::class);
    }
}
