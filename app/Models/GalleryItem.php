<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = ['album_id', 'title', 'file', 'type', 'is_active', 'added_by'];

    protected $casts = [
        'type' => 'string',
        'is_active' => 'boolean',
    ];

    public function album(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GalleryAlbum::class, 'album_id');
    }
}
