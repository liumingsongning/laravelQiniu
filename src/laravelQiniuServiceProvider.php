<?php

namespace liuming\laravelQiniu;

use Illuminate\Support\ServiceProvider;

class laravelQiniuServiceProvider extends ServiceProvider
{
    protected $defer = true; // 延迟加载服务
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/laravelQiniu.php' => config_path('laravelQiniu.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravelQiniu', function ($app) {
            return new laravelQiniu($app['session'], $app['config']);
        });
    }

    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['laravelQiniu'];
    }
}
