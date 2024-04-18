<?php

namespace App\Providers;

use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\ScheduleEloquentORM;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        $this->app->bind(
            ScheduleRepositoryInterface::class,
            ScheduleEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
