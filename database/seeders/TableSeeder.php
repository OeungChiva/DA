<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tables')->insert([
            [
                'id' => 1,
                'name' => 'T1',
                'guest' => '2',
                'status' => 'Available',
                'location' => 'Inside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'T2',
                'guest' => '4',
                'status' => 'Available',
                'location' => 'Inside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'T3',
                'guest' => '6',
                'status' => 'Available',
                'location' => 'Inside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'T4',
                'guest' => '8',
                'status' => 'Available',
                'location' => 'Inside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'T5',
                'guest' => '2',
                'status' => 'Available',
                'location' => 'Outside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'T6',
                'guest' => '4',
                'status' => 'Available',
                'location' => 'Outside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'T7',
                'guest' => '6',
                'status' => 'Available',
                'location' => 'Outside',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'T8',
                'guest' => '8',
                'status' => 'Available',
                'location' => 'Outside',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
