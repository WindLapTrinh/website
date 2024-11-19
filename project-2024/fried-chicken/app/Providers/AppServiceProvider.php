<?php

namespace App\Providers;

use App\Models\AdminNotification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        View::composer('layouts.admin', function ($view) {
            $adminNotifications = AdminNotification::where('is_read', false)->get();
            $view->with('adminNotifications', $adminNotifications);
        });

        View::composer('*', function ($view) {
            $cartItems = session()->get('cart', []);
            $totalPrice = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cartItems));
    
            $view->with(compact('cartItems', 'totalPrice'));
        });
    }
}
