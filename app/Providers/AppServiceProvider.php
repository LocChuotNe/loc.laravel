<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public $serviceBindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\RentalServiceInterface' => 'App\Services\RentalService',
        'App\Repositories\Interfaces\RentalRepositoryInterface' => 'App\Repositories\RentalRepository',
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        // foreach($this->serviceBindings as $key => $val){
        //     $this->app->bind($key, $val);
        // }

        foreach ($this->serviceBindings as $interface => $implementation) {
            if (class_exists($implementation)) {
                $this->app->bind($interface, $implementation);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
