<?php

namespace App\Providers;

use App\Model\Blog\Repositories\BlogRepository;
use App\Model\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class BlogRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );


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
