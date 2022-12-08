<?php

namespace App\Repositories\Admin;

use App\Interfaces\BrandInterface;
use App\Models\Brand;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository implements BrandInterface{
    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

}
