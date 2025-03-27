<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\Interfaces\RentalServiceInterface;
use App\Services\RentalService;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use App\Repositories\RentalRepository;
use App\Services\Interfaces\BookServiceInterface;
use App\Services\BookService;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Repositories\BookRepository;

class AppServiceProvider extends ServiceProvider
{

    public $serviceBindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\RentalServiceInterface' => 'App\Services\RentalService',
        'App\Repositories\Interfaces\RentalRepositoryInterface' => 'App\Repositories\RentalRepository',

        'App\Services\Interfaces\BookServiceInterface' => 'App\Services\BookService',
        'App\Repositories\Interfaces\BookRepositoryInterface' => 'App\Repositories\BookRepository',
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {

        foreach ($this->serviceBindings as $interface => $implementation) {
            if (class_exists($implementation)) {
                $this->app->bind($interface, $implementation);
            }
        }
        
        $this->app->bind(BookService::class, function ($app) {
            return new BookService($app->make(\App\Repositories\Interfaces\BookRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }

    // public function register(): void
    // {
    //     $this->bindRepositories();
    //     $this->bindServices();
    // }

    // protected function bindRepositories(): void
    // {
    //     app()->bind(UserRepositoryInterface::class, UserRepository::class);
    //     app()->bind(RentalRepositoryInterface::class, RentalRepository::class);
    //     app()->bind(BookRepositoryInterface::class, BookRepository::class);
    // }
    // protected function bindServices(): void
    // {
    //     app()->bind(UserServiceInterface::class, UserService::class);
    //     app()->bind(RentalServiceInterface::class, RentalService::class);
    //     app()->bind(BookServiceInterface::class, function ($app) {
    //         return new BookService($app->make(BookRepositoryInterface::class));
    //     });
    // }
}
