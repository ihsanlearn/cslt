<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearningProgressSeeder extends Seeder
{
    public function run(): void
    {
        $topics = DB::table('topics')->pluck('id', 'slug');

        $progress = [
            [
                'topic_id' => $topics['xss'],
                'status' => 'learning',
                'progress' => 40,
            ],
            [
                'topic_id' => $topics['sql-injection'],
                'status' => 'planned',
                'progress' => 0,
            ],
            [
                'topic_id' => $topics['laravel-basics'],
                'status' => 'learning',
                'progress' => 60,
            ],
            [
                'topic_id' => $topics['smart-contract-intro'],
                'status' => 'planned',
                'progress' => 0,
            ],
        ];

        DB::table('learning_progress')->insert($progress);
    }
}
