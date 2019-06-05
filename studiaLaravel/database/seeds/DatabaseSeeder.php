<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(StudenciSeeder::class);
        //$this->call(PrzedmiotySeeder::class);
        $this->call(OcenySeeder::class);
    }
}
