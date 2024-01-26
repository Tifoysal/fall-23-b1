<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        if(Schema::hasTable('categories'))
        {
            $categories=Category::all();
            View::share('headerCategories',$categories);
        }


        // if(session()->has('locale')){
        //     $current_local=session()->get('locale');
        // }else{
        //     $current_local='en';
        // }

        // View::share('current_local',$current_local);
       

    }
}
