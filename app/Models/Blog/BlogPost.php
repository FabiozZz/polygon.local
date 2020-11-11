<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class BlogPost
 * @package App\Models\Blog
 *
 * @property BlogCategory $category
 * @property User $use_id
 * @property string $title
 * @property string $slug
 * @property string $content_html
 * @property string $content_raw
 * @property string $except
 * @property string $published_at
 * @property boolean $is_published
 */
class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'except',
        'content_raw',
        'is_published',
        'published_at',
    ];
    const UNKNOWN_USER = 1;
    /**
     * Категории статьи
     *
     * @return BelongsTo
     */
    public function category()
    {
        // статья принадлежит категории
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор статьи
     *
     * @return BelongsTo
     */
    public function user()
    {
        // статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
