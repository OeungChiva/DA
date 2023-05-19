<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'id' => 1,
                'title' => 'Kuy Teav',
                'price' => '3',
                'menu' => 'Breakfast',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050840kuy teav.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'title' => 'Num Banh Chok',
                'price' => '4',
                'menu' => 'Breakfast',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050839nom banh jok.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'title' => 'Chicken Porridge',
                'price' => '4',
                'menu' => 'Breakfast',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050840bobor.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'title' => 'Beef Lok Lak',
                'price' => '5',
                'menu' => 'Dinner',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050842beef lok lak.jpeg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'title' => 'Banana Ktis',
                'price' => '2',
                'menu' => 'Dessert',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050842jek ktis.png',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'title' => 'Steamed Toddy Palm Cake',
                'price' => '4',
                'menu' => 'Dessert',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050844នំអាកោត្នោត.jpeg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'title' => 'Stir fried beef noodle',
                'price' => '3',
                'menu' => 'Dinner',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050844mi chha.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'title' => 'Fish Amok',
                'price' => '8',
                'menu' => 'Lunch',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050845Fish Amok.jpeg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'title' => 'Fried Rice',
                'price' => '4',
                'menu' => 'Lunch',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050846bay chha.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'title' => 'Chicken Rice',
                'price' => '4',
                'menu' => 'Lunch',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050846bay mon.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'title' => 'Iced Coffee',
                'price' => '2.5',
                'menu' => 'Drinks',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050848iced-coffee.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'title' => 'FRESH ORANGE JUICE',
                'price' => '3',
                'menu' => 'Drinks',
                'description' => 'Chicken Porridge made with fresh organic chicken, sliced into small pieces, and served on the warm light broth and an egg yolk on top.',
                'image' => '202318050848orange juice.jpg',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
