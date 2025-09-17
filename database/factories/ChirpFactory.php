<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chirp>
 */
class ChirpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-2 month','now');
        return [
            'user_id'=> \App\Models\User::inRandomOrder()->first(),
            'message'=>fake()->sentence(),
            'created_at'=>$date,
            'updated_at'=>$date,
        ];
    }
}
