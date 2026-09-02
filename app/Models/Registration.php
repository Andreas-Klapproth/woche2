<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'course_id', 'format', 'start_date', 'comment'])]
class Registration extends Model
{


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function interests(): BelongsToMany{
        return $this->belongsToMany(Interest::class);
    }

    protected $casts = [
        'start_date' => 'date'
    ];
}

