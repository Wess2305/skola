<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'birth_date',
        'gender',
        'phone',
        'photo',
        'address',
        'blood_type',
        'biography',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
