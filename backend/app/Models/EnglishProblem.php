<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnglishProblem extends Model
{
    use HasFactory;

    /*
    * Relationships
    */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}
