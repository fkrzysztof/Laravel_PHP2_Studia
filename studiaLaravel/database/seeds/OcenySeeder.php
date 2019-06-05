<?php

use Illuminate\Database\Seeder;

class OcenySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('oceny')->insert([
        [
            'imie' => 'Jan',
            'nazwisko' => 'Smitch',
            'przedmiot' => 'Matematyka',
            'ocena' => 4.5,
        ],
        [
            'imie' => 'Agnieszka',
            'nazwisko' => 'Ratownik',
            'przedmiot' => 'Fizyka',
            'ocena' => 3,
        ],
        [
            'imie' => 'Agnieszka',
            'nazwisko' => 'Bond',
            'przedmiot' => 'Matematyka',
            'ocena' => 5,
        ]
    ]);
    }
}
