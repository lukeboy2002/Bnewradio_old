<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'published_at',
    ];

    protected $with = [
        'category',
        'user',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn ($query) =>
        $query->where('slug', $category)
        )
        );

        $query->when($filters['user'] ?? false, fn($query, $user) =>
        $query->whereHas('user', fn ($query) =>
        $query->where('username', $user)
        )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
