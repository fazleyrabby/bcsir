<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notice extends Model
{
    protected $fillable = ['title', 'title_bn', 'slug', 'body', 'body_bn', 'file', 'type', 'is_active', 'added_by'];

    protected $casts = [
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
        static::creating(function (Notice $notice) {
            if (empty($notice->slug)) {
                $notice->slug = Str::slug($notice->title);
            }
        });
    }
}
