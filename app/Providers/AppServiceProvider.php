<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('encoded_str_imagable', function ($attribute, $value, $parameters, $validator) {
            $extension = explode(';', explode('/', $value)[1])[0];
            return in_array($extension, ['png', 'jpg', 'jpeg', 'gif']);
        });

        Validator::extend('encoded_str_voicable', function ($attribute, $value, $parameters, $validator) {
            $extension = explode(';', explode('/', $value)[1])[0];
            return in_array($extension, ['mp3', 'wav']);
        });

        Validator::extend('encoded_str_filable', function ($attribute, $value, $parameters, $validator) {
            $extension = explode(';', explode('/', $value)[1])[0];
            return in_array($extension, ['pdf', 'txt', 'pptx', 'ppt']);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
