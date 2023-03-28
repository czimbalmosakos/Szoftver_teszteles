<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['birth_date'];

    public function interests() : BelongsToMany
    {
        return $this->belongsToMany(Interest::class);
    }

    public function bloodtype() : HasOne
    {
        return $this->hasOne(BloodType::class);
    }
}
