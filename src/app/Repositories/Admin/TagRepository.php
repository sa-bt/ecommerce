<?php

namespace App\Repositories\Admin;

use App\Interfaces\TagInterface;
use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagInterface
{
    protected $model;

    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

}
