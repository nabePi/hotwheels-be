<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Menus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->insert([
            [
                'name' => 'whway',
                'description' => 'WHAT HOT WHEELS ARE YOU',
            ],
            [
                'name' => 'ith',
                'description' => 'INDONESIA TREASURE HUNT',
            ],
            [
                'name' => 'ca',
                'description' => 'CHALLENGE ACCEPTED',
            ],
            [
                'name' => 'pc',
                'description' => 'PASSPORT CARD',
            ]
        ]);
    }
}
