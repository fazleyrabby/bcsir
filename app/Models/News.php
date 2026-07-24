<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = ['title', 'title_bn', 'slug', 'body', 'body_bn', 'image', 'category_id', 'published_at', 'is_active', 'added_by'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function getTitleAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['title_bn'])) {
            return $this->attributes['title_bn'];
        }
        return $value;
    }

    public function getBodyAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['body_bn'])) {
            return $this->attributes['body_bn'];
        }
        return $value;
    }

    protected static function booted(): void
    {
        static::creating(function (News $news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class, 'category_id');
    }
}
