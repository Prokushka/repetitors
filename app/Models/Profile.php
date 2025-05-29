<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;


class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'description',
        'sex',
        'image',
        'vk_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
    protected static function booted()
    {
        static::deleting(function ($profile) {
            if ($profile->image) {
                Storage::disk('public')->delete('profiles/' . $profile->image);
            }
        });
    }
}
