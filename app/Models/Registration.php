<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'course_id', 'teilnahme', 'startdatum', 'bemerkung'])]
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
        'startdatum' => 'date'
    ];
}
