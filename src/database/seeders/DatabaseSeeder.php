<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Instagram;
use App\Models\News;
use App\Models\Twitter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(1000)->create();
        News::factory(1000)->create();
        Instagram::factory(1000)->create();
        Twitter::factory(1000)->create();

    }
}
