<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::with('thumbnail')
            ->orderBy('created_at', 'DESC')
            ->paginate(30);

        return view('gallery', [
            'title' => 'Galery Foto',
            'metas' => [
                'description' => 'Kumpulan galery yang berisi foto-foto aktivitas kami.',
            ],
            'data' => [
                'galleries' => $galleries
            ]
        ]);
    }

    public function show(string $slug){
        $gallery = Gallery::where('slug', $slug)
            ->first();

        $images = GalleryImage::where('gallery_id', $gallery->id)
            ->paginate(24);
        
        return view('gallery.show', [
            'title' => "Galery Foto | {$gallery->name}",
            'metas' => [
                'description' => "Kumpulan foto dalam galery {$gallery->name}",
            ],
            'data' => [
                'gallery' => $gallery,
                'images' => $images
            ]
        ]);  
    }
}
