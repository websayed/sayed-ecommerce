<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share('brands',$sliders=Brand::all());
        View::share('sliders',$sliders=Slider::all());
        View::share('categories',$categories=Category::all());
        Schema::defaultStringLength(191);

    }
}
