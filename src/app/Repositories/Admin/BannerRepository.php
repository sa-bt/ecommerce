<?php

namespace App\Repositories\Admin;

use App\Interfaces\BannerInterface;
use App\Models\Banner;
use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerInterface {
    protected $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

}
