<?php

namespace App\Providers;

use App\Interfaces\AddonsRepositoryInterface;
use App\Interfaces\AdminUserRepositoryInterface;
use App\Interfaces\AirportRepositoryInterface;
use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\PriceCategoryRepositoryInterface;
use App\Interfaces\PricesRepositoryInterface;
use App\Interfaces\ProductsRepositoryInterface;
use App\Interfaces\PromotionsRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\TermsAndConditionsRepositoryInterface;
use App\Repositories\AddonsRepository;
use App\Repositories\AdminUserRepository;
use App\Repositories\AirportRepository;
use App\Repositories\BookingRepository;
use App\Repositories\ImageRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\PriceCategoryRepository;
use App\Repositories\PricesRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\PromotionsRepository;
use App\Repositories\RoleRepository;
use App\Repositories\TermsAndConditionsRepository;
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
        $this->app->bind(AdminUserRepositoryInterface::class, AdminUserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(AirportRepositoryInterface::class, AirportRepository::class);
        $this->app->bind(TermsAndConditionsRepositoryInterface::class, TermsAndConditionsRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(AddonsRepositoryInterface::class, AddonsRepository::class);
        $this->app->bind(PromotionsRepositoryInterface::class, PromotionsRepository::class);
        $this->app->bind(PriceCategoryRepositoryInterface::class, PriceCategoryRepository::class);
        $this->app->bind(PricesRepositoryInterface::class, PricesRepository::class);
        
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
