<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'kurs', 'teilnahme', 'startdatum', 'bemerkung'])]
class Registration extends Model
{
    protected $casts = [
        'startdatum' => 'date'
    ];
}
