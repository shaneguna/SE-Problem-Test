<?php

declare(strict_types=1);

namespace App\Repositories\BaseRepository;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get models query builder
     */
    protected function getQuery(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Get models query builder without any scope.
     *
     * @return Builder|Model
     */
    protected function getModelQuery()
    {
        return $this->model->newModelQuery();
    }
}