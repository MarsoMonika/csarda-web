<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['slug' => 'chicken'],
            ['slug' => 'pork'],
            ['slug' => 'beef'],
            ['slug' => 'fish'],
            ['slug' => 'vegetarian'],
            ['slug' => 'other'],
        ];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'slug' => $type['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
