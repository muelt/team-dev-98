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
            'trip_id' => mt_rand(1,30),
            'timestart' => $this->faker->time(),
            'timeend' => $this->faker->time(),
            'content' => $this->faker->sentence(4,10),
            'img' => $this->faker->word,
            'link' => $this->faker->word,
            'map' => $this->faker->word,
            //
        ];
    }
}
