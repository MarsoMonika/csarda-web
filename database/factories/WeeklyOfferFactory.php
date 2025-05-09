<?php

namespace Database\Factories;

use App\Models\WeeklyOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeeklyOffer>
 */
class WeeklyOfferFactory extends Factory
{
    protected $model = WeeklyOffer::class;

    public function definition(): array
    {
        return [
            'letter' => $this->faker->randomLetter(),
            'category' => $this->faker->randomElement(['leves', 'főétel']),
            'description' => $this->faker->sentence(),
        ];
    }
}
