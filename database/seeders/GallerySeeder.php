<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Faker\Factory;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Storage;

class GallerySeeder extends Seeder
{
    /**
     * TODO: Clean database when re-run
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storage = Storage::disk('public');
        $factory = Factory::create();

        $galleries_num = 5;

        $client = new Client();

        for($i = 0; $i < $galleries_num; $i++){
            $images_count = random_int(20, 30);

            $gallery = new Gallery();
            $gallery->name = $factory->sentence(6);
            $gallery->save();

            for($j = 0; $j < $images_count; $j++){
                $imageContent = $client->request('GET', sprintf('https://picsum.photos/%d/%d', 16 * 90, 9 * 90))
                    ->getBody();

                $filename = Str::slug($factory->sentence(3)) . '.jpg';
                $storage->put("/images/{$filename}", $imageContent);

                $image = new GalleryImage();
                $image->gallery_id = $gallery->id;
                $image->caption = $factory->sentence(10);
                $image->filename = $filename;
                $image->url = asset("storage/images/{$filename}");
                $image->save();
            }
        }
    }
}
