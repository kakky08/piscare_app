<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {

            if (auth()->check()) {

                $user = auth()->user();
                $view->with('user', $user);
            }
        });
    }
}
