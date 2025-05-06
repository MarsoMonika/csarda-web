<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['slug' => 'soup'],
            ['slug' => 'cold_appetizer'],
            ['slug' => 'warm_appetizer'],
            ['slug' => 'main_course'],
            ['slug' => 'dessert'],
            ['slug' => 'garnish'],
            ['slug' => 'salad'],
            ['slug' => 'drink'],
            ['slug' => 'sauce'],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'slug' => $category['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
