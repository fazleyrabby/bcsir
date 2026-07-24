<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'name_bn', 'designation', 'designation_bn', 'department_id', 'photo', 'email', 'phone',
        'bio', 'bio_bn', 'cv_file', 'type', 'sort_order', 'is_active'
    ];

    protected $casts = [
        'type' => 'string',
    ];

    public function getNameAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['name_bn'])) {
            return $this->attributes['name_bn'];
        }
        return $value;
    }

    public function getDesignationAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['designation_bn'])) {
            return $this->attributes['designation_bn'];
        }
        return $value;
    }

    public function getBioAttribute($value)
    {
        if (app()->getLocale() === 'bn' && !empty($this->attributes['bio_bn'])) {
            return $this->attributes['bio_bn'];
        }
        return $value;
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function research(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Research::class, 'scientist_id');
    }

    public function scopeScientists($query)
    {
        return $query->where('type', 'scientist');
    }

    public function scopeDirectors($query)
    {
        return $query->where('type', 'director');
    }
}
