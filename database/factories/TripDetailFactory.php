<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TripDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripDetail>
 */
class TripDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'timestart' => $this->faker->year,
            'timeend' => $this->faker->year,
            'content' => $this->faker->sentence,
            'img' => $this->faker->word,
            'link' => $this->faker->word,
            'map' => $this->faker->word,
            //
        ];
    }
}
