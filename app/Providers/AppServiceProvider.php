<?php

namespace App\Providers;

use Illuminate\Support\Str;
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
        /*
        *   Converts a filesize into a human-readable version of the string.
        */  
        Str::macro('bytesToHuman', function($value)
        {
            $units = ['Bytes', 'KB', 'MB', 'GB', 'TB'];

            for ($i = 0; $value > 1024; $i++) {
                $value /= 1024;
            }

            return number_format($value, 2) . ' ' . $units[$i];
        });
    }
}
