<?php

namespace App\Providers;

use App\User;
use App\AnotherReservation;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\NotificationsComposer;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        View::composer([
            'layouts.users.admin.navbar', 
            'users.videoke-return.edit',
            'users.qrcode.createFile',
            'users.qrcodereturn.edit', 
            'admin.*', 'courier.*', 
            'admin.qrcode.choice',
            'pages.anotherError',
            'users.qrcode.edit', 
            'pages.qrerror',
            'users.*'
        ], NotificationsComposer::class);
    }
}
