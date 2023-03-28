<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodType extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
}