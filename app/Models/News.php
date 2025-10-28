<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'image',
        'publish_date',
        'is_published',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'is_published' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Generate slug from title
    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = \Illuminate\Support\Str::slug($news->title);
        });

        static::updating(function ($news) {
            $news->slug = \Illuminate\Support\Str::slug($news->title);
        });
    }

    // Get the route key for the model (for route model binding)
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Scope for published news
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('publish_date', '<=', now());
    }
}
