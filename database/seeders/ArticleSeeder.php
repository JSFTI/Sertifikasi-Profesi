<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use GuzzleHttp\Client;
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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('articles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::beginTransaction();
        
        $client = new Client([
            'allow_redirects' => false
        ]);

        $categories = Category::all();

        for($i = 0; $i < 123; $i++){
            $thumbnail = $client->request('GET', sprintf('https://picsum.photos/%d/%d', 16 * 90, 9 * 90))
                ->getHeader('location')[0];
            $article = new Article();
            $article->user_id = $writer_id;
            $article->thumbnail = $thumbnail;
            $article->title = $factory->sentence(10);
            $article->slug = Str::slug($article->title);
            $article->content = array_reduce($factory->paragraphs(5), fn($p, $c) => $p . "<p>{$c}</p>", '');
            $article->published_at = now()->format('Y-m-d H:i:s');

            $article->category_id = $categories->random()->id;

            $article->save();   
        }

        DB::commit();
    }
}
