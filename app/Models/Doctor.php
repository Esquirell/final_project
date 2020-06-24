<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }
}
