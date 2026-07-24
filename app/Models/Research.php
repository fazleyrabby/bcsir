<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = ['title', 'title_bn', 'scientist_id', 'abstract', 'abstract_bn', 'file', 'year', 'is_active'];

    protected $casts = [
        'year' => 'integer',
        'is_active' => 'boolean',
    ];

    public function getTitleAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['title_bn'])) {
            return $this->attributes['title_bn'];
        }
        return $value;
    }

    public function getAbstractAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['abstract_bn'])) {
            return $this->attributes['abstract_bn'];
        }
        return $value;
    }

    public function scientist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class, 'scientist_id');
    }
}
