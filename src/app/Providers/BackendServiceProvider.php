<?php

namespace App\Providers;

use App\Interfaces\AttributeInterface;
use App\Interfaces\BannerInterface;
use App\Interfaces\BaseInterface;
use App\Interfaces\BrandInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductAttributeInterface;
use App\Interfaces\ProductImageInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\ProductVariationInterface;
use App\Interfaces\TagInterface;
use App\Models\Category;
use App\Repositories\Admin\AttributeRepository;
use App\Repositories\Admin\BannerRepository;
use App\Repositories\Admin\BrandRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ProductAttributeRepository;
use App\Repositories\Admin\ProductImageRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductVariationRepository;
use App\Repositories\Admin\TagRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);

        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(AttributeInterface::class, AttributeRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(BannerInterface::class, BannerRepository::class);
        $this->app->bind(ProductImageInterface::class,ProductImageRepository::class);
        $this->app->bind(ProductAttributeInterface::class,ProductAttributeRepository::class);
        $this->app->bind(ProductVariationInterface::class,ProductVariationRepository::class);
    }
}
