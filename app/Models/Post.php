<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'keywords' => 'array',
    ];

    protected $fillable = ['title', 'slug', 'description', 'keywords', 'body', 'status', 'author_id', 'category_id', 'featured_image'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'table_row_id')->where('table_name', 'posts');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSearch($query, $search)
    {
        return $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('keywords', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
    }

    public function scopeKeyword($query, $keyword)
    {
        return $query->where('keywords', 'like', '%' . $keyword . '%');
    }

    public function scopeSort($query, $sort)
    {
        return $query->orderBy($sort['column'], $sort['order']);
    }
}
