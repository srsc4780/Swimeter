<?php

namespace App\Providers;

use App\Support\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    protected $composers = [
        '*' => \App\Http\ViewComposers\DefaultComposer::class,
    ];

    public function boot()
    {
        $this->registerComposers();

        Blade::register();
        Paginator::defaultView('pagination::semantic-ui');
    }

    public function register()
    {
        //
    }

    protected function registerComposers()
    {
        foreach ($this->composers as $key => $value) {
            \View::composer($key, $value);
        }
    }
}
