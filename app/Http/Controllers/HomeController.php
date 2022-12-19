<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('main', [
            'title' => 'Beranda'
        ]);
    }

    public function profile(){
        return view('profile', [
            'title' => 'Profil'
        ]);
    }
    
    public function visionMission(){
        return view('vision-mission', [
            'title' => 'Visi dan Misi'
        ]);
    }

    public function ourProducts(){
        return view('our-products', [
            'title' => 'Produk Kami'
        ]);
    }

    public function contactUs(){
        return view('contact-us', [
            'title' => 'Hubungi Kami'
        ]);
    }

    public function aboutUs(){
        return view('about-us', [
            'title' => 'Tentang Kami'
        ]);
    }
}
