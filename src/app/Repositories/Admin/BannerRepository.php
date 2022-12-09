<?php

namespace App\Repositories\Admin;

use App\Interfaces\BannerInterface;
use App\Models\Banner;
use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerInterface
{
    protected $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function completelyDelete(Banner $banner)
    {
        $this->deleteFile($banner);
        return $banner->delete();
    }

    public function deleteFile(Banner $banner){
        $filePath = storage_path('app/public/' . env('BANNER_IMAGES_UPLOAD_PATH')) . $banner->image;
        if (file_exists($filePath))
            unlink($filePath);
    }
}
