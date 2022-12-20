<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{    
    public function index(){
        $articles = Article::with('user')
            ->orderBy('published_at', 'DESC')
            ->paginate(24, ['id', 'title', 'thumbnail', 'slug', 'user_id', 'published_at', 'content']);

        return view('article', [
            'title' => 'Artikel Club Motor Medan',
            'metas' => [
                'description' => 'Artikel-artikel yang ditulis oleh anggota-anggota Club Motor Medan'
            ],
            'data' => [
                'articles' => $articles
            ]
        ]);
    }

    public function show(string $slug){
        $article = Article::with('user')
            ->where('slug', $slug)
            ->whereNotNull('published_at')
            ->first();

        if(!$article){
            abort(404);
            return;
        }

        $others = Article::where('id', '!=', $article->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at')
            ->limit(4)
            ->get();

        return view('article.show', [
            'title' => $article->title,
            'metas' => [
                'description' => 'Artikel yang ditulis oleh anggota-anggota Club Motor Medan'
            ],
            'data' => [
                'article' => $article,
                'others' => $others
            ]
        ]);
    }
}
