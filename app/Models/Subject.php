<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $guarded = [];

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }
}
