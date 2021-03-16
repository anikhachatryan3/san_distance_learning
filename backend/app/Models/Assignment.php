<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    use HasFactory;

    /*
    * Relationships
    */
    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function englishProblems(): HasMany
    {
        return $this->hasMany(EnglishProblem::class);
    }

    public function mathProblems(): HasMany
    {
        return $this->hasMany(MathProblem::class);
    }
}
