<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $attributes)
 */
class Student extends Model
{
    use HasFactory;

    protected $fillable = ['class_room_id', 'user_id', 'name', 'roll', 'phone'];

    public function class_room(): BelongsTo
    {
        return $this->belongsTo(classRoom::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
