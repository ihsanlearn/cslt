<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cyber Security',
                'slug' => 'cyber-security',
                'description' => 'Catatan, riset, dan pembelajaran seputar keamanan siber.'
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Materi backend, frontend, dan pengembangan aplikasi web.'
            ],
            [
                'name' => 'Blockchain',
                'slug' => 'blockchain',
                'description' => 'Pembelajaran teknologi blockchain dan smart contract.'
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
