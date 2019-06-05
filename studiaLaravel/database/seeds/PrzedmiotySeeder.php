<?php

use Illuminate\Database\Seeder;

class PrzedmiotySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('przedmiots')->insert([[
            'nazwa' => 'Programowanie',
            'godzin' => 30
        ],
        [
            'nazwa' => 'Szydełkowanie',
            'godzin' => 20
        ],
        [
            'nazwa' => 'Pływanie',
            'godzin' => 50
        ]
    ]);
    }
}
