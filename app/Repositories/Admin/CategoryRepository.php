<?php

namespace App\Repositories\Admin;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

}
