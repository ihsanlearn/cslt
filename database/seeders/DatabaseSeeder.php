<?php

namespace Database\Seeders;

use Database\Seeders\CategorySeeder;
use Database\Seeders\LearningProgressSeeder;
use Database\Seeders\NoteSeeder;
use Database\Seeders\TopicSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            TopicSeeder::class,
            LearningProgressSeeder::class,
            NoteSeeder::class,
        ]);
    }
}
