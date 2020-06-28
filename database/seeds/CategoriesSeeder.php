<?php

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
        App\Category::create([
            'id' => 1,
            'title' => 'News',
            'slug' => 'News',
        ]);

        App\Category::create([
            'id' => 2,
            'title' => 'Articles',
            'slug' => 'Articles',
        ]);

        App\Category::create([
            'id' => 3,
            'title' => 'Discussions',
            'slug' => 'Discussions',
        ]);

        App\Category::create([
            'id' => 4,
            'title' => 'Questions',
            'slug' => 'Questions',
        ]);
    }
}
