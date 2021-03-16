<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnglishSubmission extends Model
{
    use HasFactory;

    /*
    * Relationships
    */

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }

    public function englishProblem(): BelongsTo
    {
        return $this->belongsTo(EnglishProblem::class);
    }
}
