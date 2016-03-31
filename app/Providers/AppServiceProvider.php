<?php

namespace App\Providers;


use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * General Declaration
         * @return Global variables
         */

        view()->share(
            array(
                "dev_name"          =>"Nikko Zabala",
                "system_name"       =>"Stock Monitoring System System",
                "dev_email"         =>"nikko.zabala@gmail.com",
                "date_now"          => Carbon::now(),
                "project_title"     => "Stocks Monitoring System",
                "project_name"      => "/sms"

            )
        );
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
