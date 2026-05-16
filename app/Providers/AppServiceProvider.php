<?php

namespace App\Providers;

use App\Models\User;
use App\Repository\Interfaces\StudentServiceInterface;
use App\Repository\Interfaces\SupremeAdminServiceInterface;
use App\Repository\StudentServiceRepository;
use App\Repository\SupremeAdminServiceRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentServiceInterface::class, StudentServiceRepository::class);
        $this->app->bind(SupremeAdminServiceInterface::class,SupremeAdminServiceRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //    Gate::define('super_admin',function(User $user){
    //         return $user->role == 'super_admin';
    //    });

    //    Gate::define('admin',function(User $user){
    //         return $user->role == 'admin';
    //    });

       Gate::define('supreme_admin',function(User $user){
            return $user->role == 'supreme_admin';

       });

       Gate::define('super_and_supreme',function(User $user){
            return in_array($user->role,['super_admin','supreme_admin']);
       });
    }
}
