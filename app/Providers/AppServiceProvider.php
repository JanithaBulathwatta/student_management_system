<?php

namespace App\Providers;

use App\Models\User;
use App\Repository\Interfaces\StudentServiceInterface;
use App\Repository\StudentServiceRepository;
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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Gate::define('student_manage',function(User $user){
            return $user->role == 'super_admin';
       });

       Gate::define('view_student',function(User $user){
            return in_array($user->role, ['admin', 'super_admin']);
       });
    }
}
