<?php

use Illuminate\Database\Seeder;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Channel::create([
            'id' => 1,
            'title' => 'Con Panna Barista Course',
            'slug' => 'Con Panna Barista Course',
        ]);
        App\Channel::create([
            'id' => 2,
            'title' => 'Con Panna Roasting Class',
            'slug' =>  'Con Panna Roasting Class',
        ]);
        App\Channel::create([
            'id' => 3,
            'title' => 'Monaco International Bartending Course',
            'slug' => 'Monaco International Bartending Course',
        ]);
        App\Channel::create([
            'id' => 4,
            'title' => 'Monaco International Academy',
            'slug' => 'Monaco International Academy',
        ]);
        App\Channel::create([
            'id' => 5,
            'title' => 'Sari Ayu Fashion Design',
            'slug' => 'Sari Ayu Fashion Design',
        ]);
        App\Channel::create([
            'id' => 6,
            'title' => 'Sari Ayu Kursus Menjahit',
            'slug' => 'Sari Ayu Kursus Menjahit',
        ]);
    }
}
