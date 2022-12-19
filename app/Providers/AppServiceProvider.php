<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $sidebars = [
            [
                'href' => url('/'),
                'active' => false,
                'expanded' => false,
                'label' => 'Home'
            ],
            [
                'href' => url('/artikel'),
                'active' => false,
                'expanded' => false,
                'label' => 'Artikel'
            ],
            [
                'href' => url('/event'),
                'active' => false,
                'expanded' => false,
                'label' => 'Event'
            ],
            [
                'href' => url('/galery'),
                'active' => false,
                'expanded' => false,
                'label' => 'Galery Foto'
            ],
            [
                'href' => url('/klien-kami'),
                'active' => false,
                'expanded' => false,
                'label' => 'Klien Kami'
            ],
            [
                'href' => null,
                'active' => false,
                'expanded' => false,
                'label' => 'Login',
                'children' => [
                    [
                        'href' => url('/sign-in'),
                        'active' => false,
                        'expanded' => false,
                        'label' => 'Sign In'
                    ],
                    [
                        'href' => url('/sign-up'),
                        'active' => false,
                        'expanded' => false,
                        'label' => 'Sign Up'
                    ],
                ]
            ],
        ];

        navs_activate($sidebars);
        
        View::composer('*', function($view) use ($sidebars){
            $view->with('sidebars', $sidebars);
        });

        Paginator::defaultView('partials.pagination');
    }
}
