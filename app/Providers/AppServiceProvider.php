<?php

namespace App\Providers;

use Illuminate\Queue\Queue;
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
     *  运行注册后的启动服务。
     *
     * @return void
     */
    public function boot()
    {
      Queue::failing(function ($event) {

      });
    }
}
