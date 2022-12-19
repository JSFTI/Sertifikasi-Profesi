<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder{
  public function run(){
    $this->call([
      ArticleSeeder::class
    ]);
  }
}