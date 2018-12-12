<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //khởi chạy khi laravel chạy lên, đồng nghĩa mình đưa chi lên thì hấn cũng tồn tại cùng lúc
        $data['category'] = Category::all();
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
