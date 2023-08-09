<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'status',
        'image',
        'description',
        'source_id'
    ];

    public function scopeStatus(Builder $query)
    {
        $param = request()->query('f', 'all');
        if ($param === 'all') {
            return  $query;
        }
        return $query->where('status', $param);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }
}
