<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
    }

    public function scopeSort($query, $sort)
    {
        return $query->orderBy($sort['column'], $sort['order']);
    }

    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            return $query->search($search);
        })->when($filters['sort'] ?? null, function ($query, $sort) {
            return $query->sort($sort);
        });
    }

    public function scopePaginate($query, $paginate)
    {
        return $query->paginate($paginate);
    }
}
