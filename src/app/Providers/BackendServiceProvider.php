<?php

namespace App\Providers;

use App\Interfaces\AttributeInterface;
use App\Interfaces\BaseInterface;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Repositories\Admin\AttributeRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);

        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(AttributeInterface::class, AttributeRepository::class);
    }
}
