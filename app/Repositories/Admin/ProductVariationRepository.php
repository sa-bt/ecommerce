<?php

namespace App\Repositories\Admin;

use App\Interfaces\ProductVariationInterface;
use App\Models\ProductVariation;
use App\Repositories\BaseRepository;

class ProductVariationRepository extends BaseRepository implements ProductVariationInterface
{
    protected $model;

    public function __construct(ProductVariation $model)
    {
        $this->model = $model;
    }

}
