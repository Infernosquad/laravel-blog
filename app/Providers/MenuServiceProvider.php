<?php
namespace App\Providers;

use Menu;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $menu = Menu::make('main', function($menu) {
            $menu->add(trans('navbar.home'), array('route' => 'home'));
            $menu->add(trans('navbar.articles'), array('route' => 'article.index'));
            $menu->add(trans('navbar.post'), array('route' => 'article.create'));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}