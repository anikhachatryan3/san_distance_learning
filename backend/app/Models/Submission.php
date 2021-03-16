<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Submission extends Model
{
    use HasFactory;

    /*
    * Relationships
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    public function mathSubmissions(): HasMany
    {
        return $this->hasMany(MathSubmission::class);
    }

    public function englishSubmissions(): HasMany
    {
        return $this->hasMany(EnglishSubmission::class);
    }
}
