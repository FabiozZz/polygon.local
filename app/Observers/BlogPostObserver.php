<?php

namespace App\Observers;

use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;


class BlogPostObserver
{
    /**
     * обработка ПЕРЕД созданием записи.
     *
     * @param \App\Models\Blog\BlogPost $blogPost
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublished($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * обработка ПЕРЕД обновлением записи.
     *
     * @param \App\Models\Blog\BlogPost $blogPost
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublished($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Если дата создания не установлена и приходит установка флага - Опубликовано,
     * то устанавливаем дату публикации текущуюю
     * @param BlogPost $blogPost
     */
    protected function setPublished(BlogPost $blogPost)
    {
        $needSetPublished = empty($blogPost->published_at) && $blogPost->is_published;
//        dd($needSetPublished);
        if ($needSetPublished) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * Если поле слаг пустое, то заполним его конвертацией заголовкаю
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    /**
     * Handle the BlogPost "deleted" event.
     *
     * @param \App\Models\Blog\BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param \App\Models\Blog\BlogPost $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param \App\Models\Blog\BlogPost $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    public function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    public function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }
}
