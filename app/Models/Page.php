<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'title_bn', 'slug', 'content', 'content_bn', 'type', 'is_published', 'added_by'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getTitleAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['title_bn'])) {
            return $this->attributes['title_bn'];
        }
        return $value;
    }

    public function getContentAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['content_bn'])) {
            return $this->attributes['content_bn'];
        }
        return $value;
    }
}
