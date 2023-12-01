<?php

namespace Database\Factories;

use App\Models\Twitter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TwitterFactory extends Factory
{
    protected $model = Twitter::class;

    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph(),
            'source' => $this->faker->userName(),
            'url' => $this->faker->url(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
