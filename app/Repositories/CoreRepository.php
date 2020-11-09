<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Репозитория работы с сцщностью
 * Может выдавать наборы данных
 * Не может создавать\изменять сущность
 */

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }
    /**
     * @return mixed
     */
    abstract protected function getModelClass();
    /**
     * @return Model | Application | mixed
     */
    protected function startConditions(){
        return clone $this->model;
    }
}
