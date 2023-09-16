<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'body', 'table_name', 'table_row_id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'table_row_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'table_row_id');
    }
}
