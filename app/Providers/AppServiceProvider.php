<?php

namespace App\Providers;

use App\Models\CompanyContact;
use App\Models\CompanyInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once base_path().'/app/Http/Helpers/GlobalFunction.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    //     Paginator::useBootstrap();
    //     $site_info = CompanyInfo::first();
    //    $site_contact_info = CompanyContact::first();
    //     view()->share('site_info',$site_info);
    //     view()->share('site_contact_info',$site_contact_info);
    }
}
