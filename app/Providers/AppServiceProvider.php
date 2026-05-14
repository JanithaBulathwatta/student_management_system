<?php

namespace App\Providers;

use App\Repository\Interfaces\StudentServiceInterface;
use App\Repository\StudentServiceRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentServiceInterface::class, StudentServiceRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
