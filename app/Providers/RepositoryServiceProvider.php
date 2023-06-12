<?php

namespace App\Providers;

use App\Interfaces\AssetInterface;
use App\Interfaces\AttachmentInterface;
use App\Interfaces\UserInterface;
use App\Repositories\AssetRepository;
use App\Repositories\AttachmentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AssetInterface::class, AssetRepository::class);
        $this->app->bind(AttachmentInterface::class, AttachmentRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
