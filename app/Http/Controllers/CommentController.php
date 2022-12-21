<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(int $article_id){
        $comments = Comment::where('article_id', $article_id)
            ->cursorPaginate(10);

        return response()->json($comments);        
    }
}
