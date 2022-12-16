<?php

use Illuminate\Support\Carbon;

function generateFileName($fileName)
{
    return Carbon::now()->format('Y_m_d_H_i_s_u') . '_' . $fileName;
}

function uploadProductImages($primaryImage, $images)
{

    //upload primary image
    $fileNamePrimary = generateFileName($primaryImage->getClientOriginalName());
    $primaryImage->move(storage_path(env('PRODUCT_IMAGES_UPLOAD_PATH')), $fileNamePrimary);

    //upload another images
    $fileNameImages = [];
    foreach ($images as $image) {
        $fileNameImage = generateFileName($image->getClientOriginalName());
        $image->move(storage_path(env('PRODUCT_IMAGES_UPLOAD_PATH')), $fileNamePrimary);
        $fileNameImages[] = $fileNameImage;
    }
    return [$fileNamePrimary, $fileNameImages];
}

function uploadBannerImage($image)
{
    $fileNameImage = generateFileName($image->getClientOriginalName());
    $image->move(storage_path('app/public/'.env('BANNER_IMAGES_UPLOAD_PATH')), $fileNameImage);

    return $fileNameImage;
}

