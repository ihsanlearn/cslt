<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\LearningProgress;
use App\Models\Note;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Main User
        $user = User::factory()->create([
            'name' => 'Ihsan Learn',
            'email' => 'ihsan@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create Categories
        $categories = [
            'Cyber Security' => [
                'description' => 'Everything about securing systems and networks.',
                'topics' => [
                    'XSS' => 'Cross-Site Scripting vulnerabilities and prevention.',
                    'SQL Injection' => 'Database injection attacks.',
                    'CSRF' => 'Cross-Site Request Forgery.',
                ]
            ],
            'Web Development' => [
                'description' => 'Full stack web development resources.',
                'topics' => [
                    'Laravel' => 'The PHP Framework for Web Artisans.',
                    'React' => 'A JavaScript library for building user interfaces.',
                    'Tailwind CSS' => 'A utility-first CSS framework.',
                ]
            ],
            'DevOps' => [
                'description' => 'Development and Operations practices.',
                'topics' => [
                    'Docker' => 'Containerization platform.',
                    'CI/CD' => 'Continuous Integration and Continuous Delivery.',
                ]
            ]
        ];

        // Create Tags
        $tagNames = ['Important', 'Beginner', 'Advanced', 'Practical', 'Theory'];
        $tags = collect($tagNames)->map(function ($name) {
            return Tag::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        });

        foreach ($categories as $catName => $catData) {
            $category = Category::create([
                'user_id' => $user->id,
                'name' => $catName,
                'slug' => Str::slug($catName),
                'description' => $catData['description'],
            ]);

            foreach ($catData['topics'] as $topicName => $topicDesc) {
                $topic = Topic::create([
                    'category_id' => $category->id,
                    'name' => $topicName,
                    'slug' => Str::slug($topicName),
                    'description' => $topicDesc,
                ]);

                // Create Notes for Topic
                for ($i = 1; $i <= 3; $i++) {
                    $note = Note::create([
                        'topic_id' => $topic->id,
                        'title' => "Note $i for $topicName",
                        'slug' => Str::slug("Note $i for $topicName " . Str::random(5)),
                        'content' => "# Learning $topicName\n\nThis is the content for note $i. It contains **markdown**.\n\n- Point 1\n- Point 2",
                        'is_public' => rand(0, 1),
                    ]);

                    // Attach random tags
                    $note->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
                }

                // Randomly create progress
                if (rand(0, 1)) {
                    LearningProgress::create([
                        'user_id' => $user->id,
                        'topic_id' => $topic->id,
                        'status' => collect(['planned', 'learning', 'completed'])->random(),
                        'percentage' => rand(0, 100),
                        'last_learned_at' => now()->subDays(rand(1, 30)),
                    ]);
                }
            }
        }
    }
}
