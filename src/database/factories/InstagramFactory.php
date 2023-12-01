<?php

namespace Database\Factories;

use App\Enums\InstagramPostType;
use App\Models\Instagram;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InstagramFactory extends Factory
{
    protected $model = Instagram::class;

    public function definition(): array
    {
        return [
            'post_type' => $this->faker->randomElement(InstagramPostType::asArray()),
            'body' => $this->faker->paragraph(),
            'source' => $this->faker->userName(),
            'url' => $this->faker->url(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
