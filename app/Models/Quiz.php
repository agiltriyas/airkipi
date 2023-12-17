<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
