<?php

namespace Database\Factories;

Use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\PiglyUser::factory(), // PiglyUser を使用
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 50, 100),// 小数点以下1桁、50.0kg 〜 100.0kg のランダム値指定
            'calories' => $this->faker->numberBetween(100, 3000),
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->text(50),//文章の文字数指定
        ];
    }
}
