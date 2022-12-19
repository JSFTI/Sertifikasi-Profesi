<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Factory::create();

        $writer_id = User::select('id')->whereRoleIs('admin')->first()->id;

        DB::table('articles')->truncate();

        DB::beginTransaction();

        for($i = 0; $i < 123; $i++){
            $article = new Article();
            $article->user_id = $writer_id;
            $article->thumbnail = sprintf('https://picsum.photos/%d/%d', 16 * 90, 9 * 90);
            $article->title = $factory->sentence(10);
            $article->slug = Str::slug($article->title);
            $article->content = array_reduce($factory->paragraphs(5), fn($p, $c) => $p . "<p>{$c}</p>", '');
            $article->save();
        }

        DB::commit();
    }
}
