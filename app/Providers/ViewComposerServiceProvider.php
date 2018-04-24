<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        //ADMIN VIEWS
        View::composer('admin.frame-sizes.all','App\Http\ViewComposers\FrameSizeComposer');
        
        View::composer('admin.order-locations.all','App\Http\ViewComposers\OrderLocationsComposer');
        
        View::composer('admin.frames.all','App\Http\ViewComposers\FrameListComposer');

        //View Composer for Frames creation and modification
        View::composer(['admin.frames.create','admin.frames.edit'],'App\Http\ViewComposers\FrameComposer');


        //SITE VIEWS
        View::composer(['includes.header',
                        'site.orders.cart',
                        'site.orders.checkout'],'App\Http\ViewComposers\HomeComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
