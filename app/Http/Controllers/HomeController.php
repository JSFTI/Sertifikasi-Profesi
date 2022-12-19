<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::with('user')
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->get(['id', 'title', 'thumbnail', 'slug', 'user_id', 'published_at', 'content']);

        $events = Event::with(['user'])
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->get(['id', 'title', 'thumbnail', 'slug', 'location', 'user_id', 'published_at']);
        
        return view('main', [
            'title' => 'Beranda',
            'metas' => [
                'description' => "Kami adalah kumpulan pemotor yang sangat antusias dengan motor di Medan. Jika Anda memiliki antusiasme yang tinggi dengan sepeda motor dan ingin memiliki suatu perkumpulan dengan orang-orang yang memiliki ketertarikan yang sama dengan Anda, Anda cocok untuk bergabung dengan CLUB MOTOR MEDAN."
            ],
            'data' => [
                'articles' => $articles,
                'events' => $events
            ]
        ]);
    }

    public function profile(){
        return view('profile', [
            'title' => 'Profil',
            'metas' => [
                'description' => "Profil CLUB MOTOR MEDAN."
            ]
        ]);
    }
    
    public function visionMission(){
        return view('vision-mission', [
            'title' => 'Visi dan Misi',
            'metas' => [
                'description' => "Visi dan misi CLUB MOTOR MEDAN."
            ]
        ]);
    }

    public function ourProducts(){
        return view('our-products', [
            'title' => 'Produk Kami',
            'metas' => [
                'description' => "Produk CLUB MOTOR MEDAN."
            ]
        ]);
    }

    public function contactUs(){
        return view('contact-us', [
            'title' => 'Hubungi Kami',
            'metas' => [
                'description' => "Informasi kontak CLUB MOTOR MEDAN."
            ]
        ]);
    }

    public function aboutUs(){
        return view('about-us', [
            'title' => 'Tentang Kami',
            'metas' => [
                'description' => "Tentang CLUB MOTOR MEDAN."
            ]
        ]);
    }
}
