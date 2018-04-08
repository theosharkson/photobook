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
        View::composer('admin.frame-sizes.all','App\Http\ViewComposers\FrameSizeComposer');
        
        View::composer('admin.frames.all','App\Http\ViewComposers\FrameListComposer');

        //View Composer for Frames creation and modification
        View::composer(['admin.frames.create','admin.frames.edit'],'App\Http\ViewComposers\FrameComposer');
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
