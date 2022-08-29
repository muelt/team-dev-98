<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,8)),
            'slug' => $this->faker->slug(),
            'date' => $this->faker->dateTimeBetween('-5 weeks', '-1 week'),
            // 'cities' => $this->faker->streetName(),
            'body' => $this->faker->sentence(mt_rand(40,60)),
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,5),
            'prefecture_id' => mt_rand(1,4),
            //
        ];
    }

    
}
