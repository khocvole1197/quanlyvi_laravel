<?php

namespace App\Providers;

use App\Repositories\DealMoney\DealRepository;
use App\Repositories\DealMoney\DealRepositoryEloquent;
use App\Repositories\Wallet\WalletRepository;
use App\Repositories\Wallet\WalletRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(DealRepository::class, DealRepositoryEloquent::class);
        $this->app->singleton(WalletRepository::class, WalletRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
