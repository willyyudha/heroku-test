<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use composer dump-autoload if seeder class not found
         $this->call(userseeder::class);
         //$this->call(ChannelsSeeder::class);
         //$this->call(CategoriesSeeder::class);
    }
}
