<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublish($query)
    {
        $query->where('status', 'published');
    }

    public function scopePost($query)
    {
        $query->where('isPost', 1);
    }

    public function scopeContent($query)
    {
        $query->where('isPost', 0);
    }


    public function getThumbnailAttribute($query)
    {
        return url('storage/' . $query);
    }

    public function getHeaderimageAttribute($query)
    {
        return url('storage/' . $query);
    }
}
