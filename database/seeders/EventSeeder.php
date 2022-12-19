<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventContactPerson;
use App\Models\EventSchedule;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class EventSeeder extends Seeder
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
        DB::table('events')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::beginTransaction();

        $client = new Client([
            'allow_redirects' => false
        ]);

        for($i = 0; $i < 123; $i++){
            $thumbnail = $client->request('GET', sprintf('https://picsum.photos/%d/%d', 16 * 90, 9 * 90))
                ->getHeader('location')[0];

            $event = new Event();
            $event->user_id = $writer_id;
            $event->thumbnail = $thumbnail;
            $event->title = $factory->sentence(10);
            $event->slug = Str::slug($event->title);
            $event->location = $factory->sentence(3);
            $event->content = array_reduce($factory->paragraphs(5), fn($p, $c) => $p . "<p>{$c}</p>", '');
            $event->published_at = now()->format('Y-m-d H:i:s');
            $event->save();

            $schedule_num = random_int(1, 2);
            
            for($j = 0; $j < $schedule_num; $j++){
                $schedule = new EventSchedule();
                $schedule->event_id = $event->id;
                $schedule->start = $factory->date('Y-m-d') . ' ' . $factory->time('H:i:s');
                $schedule->end = $factory->date('Y-m-d') . ' ' . $factory->time('H:i:s');

                $schedule->save();
            }

            $contact_num = random_int(1, 3);
             
            for($j = 0; $j < $contact_num; $j++){
                $contact = new EventContactPerson();
                $contact->event_id = $event->id;
                $contact->name = $factory->name();
                $contact->contact = match (random_int(1,2)) {
                    1 => $factory->email(),
                    2 => $factory->phoneNumber(),
                    default => $factory->email()
                };

                $contact->save();
            }
        }

        DB::commit();
    }
}
