<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';

    public const EDITOR_TYPE_RICHTEXT = 0;
    public const EDITOR_TYPE_MARKDOWN = 1;
    public const EDITOR_TYPE_EDITORJS = 2;
    public const EDITOR_TYPE_GRAPEJS = 3;

    protected $casts = [
        'keywords' => 'array',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'content',
        'editor_type_id',
        'status',
        'author_id',
        'category_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public function scopeDraft($query)
    {
        return $query->where('status', self::STATUS_DRAFT);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('keywords', 'like', '%' . $search . '%');
    }
}
