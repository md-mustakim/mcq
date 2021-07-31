<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $attributes)
 */
class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        "class_room_id",
        "user_id",
        "subject_id",
        "name",
        "duration",
        "marks"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function class_room(): BelongsTo
    {
        return $this->belongsTo(classRoom::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
