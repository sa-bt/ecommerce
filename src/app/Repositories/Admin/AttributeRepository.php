<?php

namespace App\Repositories\Admin;

use App\Interfaces\AttributeInterface;
use App\Models\Attribute;
use App\Repositories\BaseRepository;

class AttributeRepository extends BaseRepository implements AttributeInterface
{
    protected $model;

    public function __construct(Attribute $model)
    {
        $this->model = $model;
    }

}
