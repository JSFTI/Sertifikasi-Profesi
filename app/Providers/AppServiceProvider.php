<?php

namespace App\Providers;

use Auth;
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
                'label' => 'Home',
                'auth' => null,
            ],
            [
                'href' => url('/artikel'),
                'active' => false,
                'expanded' => false,
                'label' => 'Artikel',
                'auth' => null,
            ],
            [
                'href' => url('/event'),
                'active' => false,
                'expanded' => false,
                'label' => 'Event',
                'auth' => null,
            ],
            [
                'href' => url('/galery'),
                'active' => false,
                'expanded' => false,
                'label' => 'Galery Foto',
                'auth' => null,
            ],
            [
                'href' => url('/klien-kami'),
                'active' => false,
                'expanded' => false,
                'label' => 'Klien Kami',
                'auth' => null,
            ],
            [
                'href' => null,
                'active' => false,
                'expanded' => false,
                'label' => 'Login',
                'auth' => false,
                'children' => [
                    [
                        'href' => null,
                        'active' => false,
                        'expanded' => false,
                        'label' => 'Sign In',
                        'auth' => false,
                        'attributes' => [
                            'onclick' => 'MicroModal.show(\'sign-in-modal\')'
                        ]
                    ],
                    [
                        'href' => null,
                        'active' => false,
                        'expanded' => false,
                        'label' => 'Sign Up',
                        'auth' => false,
                        'attributes' => [
                            'onclick' => 'MicroModal.show(\'sign-up-modal\')'
                        ]
                    ],
                ]
            ],
            [
                'href' => url('/dashboard'),
                'active' => false,
                'expanded' => false,
                'label' => 'Dashboard',
                'auth' => true,
            ],
            [
                'href' => url('/logout'),
                'active' => false,
                'expanded' => false,
                'label' => 'Sign Out',
                'auth' => true,
            ],
        ];

        navs_activate($sidebars);
        
        View::composer('*', function($view) use ($sidebars){
            $view->with('sidebars', $sidebars);
        });

        Paginator::defaultView('partials.pagination');
    }
}
