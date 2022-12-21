<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
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

        $categories = [];

        for($i = 0; $i < 20; $i++){
            $categories[] = [
                'name' => $factory->word()
            ];
        }

        Category::insert($categories);

        DB::commit();
    }
}
