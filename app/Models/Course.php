<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['titel', 'beschreibung'])]
class Course extends Model
{
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}
