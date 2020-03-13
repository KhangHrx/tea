<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use DB;
use App\Quotaion;
use App\Helper\CartHelper;

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
        view()->composer('*',function($view){
            $view->with([
                'nowString' => Carbon::now()->toDateTimeString(),
                'nowTimeStamp' => Carbon::now()->timestamp,
                'cart'=> new CartHelper()
            ]);
        });
    }
}
