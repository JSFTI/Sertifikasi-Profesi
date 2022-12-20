<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurClientController extends Controller
{
    public function index(){
        // Hardcoded
        $clients = [
            [
                'name' => 'Bayerische Motoren Werke AG',
                'logo' => asset('/assets/clients/bmw.png'),
                'bg' => 'light'
            ],
            [
                'name' => 'Ducati',
                'logo' => asset('/assets/clients/ducati.png'),
                'bg' => 'dark'
            ],
            [
                'name' => 'Harley-Davidson',
                'logo' => asset('/assets/clients/harley-davidson.png'),
                'bg' => 'light'
            ],
            [
                'name' => 'Honda',
                'logo' => asset('/assets/clients/honda.png'),
                'bg' => 'dark'
            ],
            [
                'name' => 'Kawasaki',
                'logo' => asset('/assets/clients/kawasaki.png'),
                'bg' => 'light'
            ],
            [
                'name' => 'Suzuki',
                'logo' => asset('/assets/clients/suzuki.png'),
                'bg' => 'dark'
            ],
            [
                'name' => 'Vespa',
                'logo' => asset('/assets/clients/vespa.png'),
                'bg' => 'dark'
            ],
            [
                'name' => 'Yamaha',
                'logo' => asset('/assets/clients/yamaha.png'),
                'bg' => 'dark'
            ],
        ];

        return view('our-clients', [
            'title' => 'Klien Club Motor Medan',
            'metas' => [
                'description' => 'Klien yang menaruh kepercayaan pada Club Motor Medan'
            ],
            'data' => [
                'clients' => $clients
            ]
        ]);
    }
}
