<?php

namespace App\Repositories\Admin;

use App\Interfaces\ProductAttributeInterface;
use App\Models\ProductAttribute;
use App\Repositories\BaseRepository;

class ProductAttributeRepository extends BaseRepository implements ProductAttributeInterface
{
    protected $model;

    public function __construct(ProductAttribute $model)
    {
        $this->model = $model;
    }

}
