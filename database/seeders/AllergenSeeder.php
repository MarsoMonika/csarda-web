<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allergens = [
            'celery' => ['hu' => 'Zeller', 'en' => 'Celery', 'de' => 'Sellerie'],
            'crustaceans' => ['hu' => 'Rákfélék', 'en' => 'Crustaceans', 'de' => 'Krebstiere'],
            'gluten' => ['hu' => 'Glutén', 'en' => 'Gluten', 'de' => 'Gluten'],
            'fish' => ['hu' => 'Hal', 'en' => 'Fish', 'de' => 'Fisch'],
            'mustard' => ['hu' => 'Mustár', 'en' => 'Mustard', 'de' => 'Senf'],
            'milk' => ['hu' => 'Tej', 'en' => 'Milk', 'de' => 'Milch'],
            'nuts' => ['hu' => 'Diófélék', 'en' => 'Tree nuts', 'de' => 'Schalenfrüchte'],
            'sesame' => ['hu' => 'Szezámmag', 'en' => 'Sesame', 'de' => 'Sesamsamen'],
            'peanuts' => ['hu' => 'Földimogyoró', 'en' => 'Peanuts', 'de' => 'Erdnüsse'],
            'molluscs' => ['hu' => 'Puhatestűek', 'en' => 'Molluscs', 'de' => 'Weichtiere'],
            'sulphites' => ['hu' => 'Kén-dioxid', 'en' => 'Sulphites', 'de' => 'Schwefeldioxid'],
            'soy' => ['hu' => 'Szója', 'en' => 'Soy', 'de' => 'Soja'],
            'eggs' => ['hu' => 'Tojás', 'en' => 'Eggs', 'de' => 'Eier'],
            'lupin' => ['hu' => 'Csillagfürt', 'en' => 'Lupin', 'de' => 'Lupinen'],
        ];
        foreach ($allergens as $slug => $translations) {
            $allergenId = DB::table('allergens')->insertGetId([
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($translations as $locale => $name) {
                DB::table('allergen_translations')->insert([
                    'allergen_id' => $allergenId,
                    'locale' => $locale,
                    'name' => $name,
                ]);
            }
        }
    }
}
