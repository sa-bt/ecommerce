<?php

namespace App\Repositories\Admin;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

}
