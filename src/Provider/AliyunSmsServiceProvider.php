<?php

namespace Qcth\AliyunSms\Provider;

use Illuminate\Support\ServiceProvider;
use Qcth\AliyunSms\Index;

class AliyunSmsServiceProvider extends ServiceProvider
{

    //服务提供者延迟加载
    protected $defer=true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('AliyunSms',function ($app){
            return new Index($app);
        });


    }

    /**
     * 
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

       
    }

    public  function  provides()
    {
        return ['AliyunSms'];
    }
}
