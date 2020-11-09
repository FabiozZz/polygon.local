<?php


namespace App\Repositories;

use App\Models\Blog\BlogPost as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в список
     * (Админка)
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'user_id',
            'category_id',
            'published_at',
        ];
        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
//            ->with(['category','user'])
            ->with([
                'category:id,title',
                'user:id,name'
            ])
            ->paginate(25);
        return $result;
    }
}
