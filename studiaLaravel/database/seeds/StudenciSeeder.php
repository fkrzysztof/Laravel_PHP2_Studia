<?php

use Illuminate\Database\Seeder;

class StudenciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studenci')->insert([
        [
        'imie' => 'Jan',
        'nazwisko' => 'Smith'
        ],
        [
        'imie' => 'Agnieszka',
        'nazwisko' => 'Bond'
        ],
        [
        'imie' => 'Monika',
        'nazwisko' => 'Ratownik'
        ]
        ]);

    }
}
