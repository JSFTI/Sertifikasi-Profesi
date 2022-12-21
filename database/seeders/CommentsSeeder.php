<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Factory::create();

        DB::beginTransaction();

        $articles = Article::all();

        foreach($articles as $article){
            for($i = 0; $i < 50; $i++){
                $comment = new Comment();

                $comment->name = $factory->name();
                $comment->content = $factory->paragraph();
                $comment->article_id = $article->id;
                $comment->save();
            }
        }

        DB::commit();
    }
}
