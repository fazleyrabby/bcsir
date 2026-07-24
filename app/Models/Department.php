<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'name_bn', 'slug', 'description', 'description_bn', 'sort_order', 'type', 'is_active'];

    public function getNameAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['name_bn'])) {
            return $this->attributes['name_bn'];
        }
        return $value;
    }

    public function getDescriptionAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['description_bn'])) {
            return $this->attributes['description_bn'];
        }
        return $value;
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
