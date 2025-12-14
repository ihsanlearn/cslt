<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        // ambil id kategori
        $categories = DB::table('categories')->pluck('id', 'slug');

        $topics = [
            // Cyber Security
            [
                'category_id' => $categories['cyber-security'],
                'title' => 'Cross-Site Scripting (XSS)',
                'slug' => 'xss',
                'description' => 'Catatan dan eksplorasi kerentanan XSS.',
            ],
            [
                'category_id' => $categories['cyber-security'],
                'title' => 'SQL Injection',
                'slug' => 'sql-injection',
                'description' => 'Teknik, dampak, dan pencegahan SQL Injection.',
            ],

            // Web Development
            [
                'category_id' => $categories['web-development'],
                'title' => 'Laravel Basics',
                'slug' => 'laravel-basics',
                'description' => 'Dasar-dasar framework Laravel.',
            ],

            // Blockchain
            [
                'category_id' => $categories['blockchain'],
                'title' => 'Smart Contract Introduction',
                'slug' => 'smart-contract-intro',
                'description' => 'Pengenalan smart contract dan blockchain.',
            ],
        ];

        DB::table('topics')->insert($topics);
    }
}
