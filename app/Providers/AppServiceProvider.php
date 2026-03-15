<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        $navlist = DB::table('navlist')->orderBy('nav_order', 'desc')->get();
        $footerContacts = DB::table('footer_contacts')->get();
        $footerSocial = DB::table('footer_social')->get();
        $logo = DB::table('logo_button')->get()->first();
        $whatsapp = DB::table('whatsapp')->get()->first();

        View::share([
            'navlist' => $navlist,
            'footerContacts' => $footerContacts,
            'footerSocial' => $footerSocial,
            'logo' => $logo,
            'whatsapp' => $whatsapp,
            // Add more variables here if needed
        ]);
    }
}
