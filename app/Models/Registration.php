<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'email', 'course_id', 'teilnahme', 'startdatum', 'bemerkung'])]
class Registration extends Model
{
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    protected $casts = [
        'startdatum' => 'date'
    ];
}
