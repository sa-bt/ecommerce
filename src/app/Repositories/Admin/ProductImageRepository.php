<?php

namespace App\Repositories\Admin;

use App\Interfaces\ProductImageInterface;
use App\Models\ProductImage;
use App\Repositories\BaseRepository;

class ProductImageRepository extends BaseRepository implements ProductImageInterface
{
    protected $model;

    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }

}
