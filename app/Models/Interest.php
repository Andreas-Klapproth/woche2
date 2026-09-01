<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name'])]
class Interest extends Model
{
    public function registrations() : BelongsToMany{
        return $this->belongsToMany(Registration::class);
    }
}
