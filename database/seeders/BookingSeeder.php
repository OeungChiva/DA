<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'id' => 1,
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '03454356',
                'guest' => '4',
                'date' => '2023-05-19',
                'time' => '17:45',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'phone' => '034543567',
                'guest' => '2',
                'date' => '2023-05-19',
                'time' => '18:45',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'phone' => '0345435678',
                'guest' => '5',
                'date' => '2023-05-19',
                'time' => '19:00',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
