<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Record extends Model
{


    protected $fillable = [
        'reception'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

}
