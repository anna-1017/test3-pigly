<?php

namespace Database\Factories;

Use App\Models\WeightTarget;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\PiglyUser::factory(), 
            'target_weight' => $this->faker->randomFloat(1, 50, 100),
        ];
    }
}
