<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        $topics = DB::table('topics')->pluck('id', 'slug');

        $notes = [
            [
                'topic_id' => $topics['xss'],
                'title' => 'Pengantar XSS',
                'content' => <<<EOT
                    ### Apa itu XSS?
                    Cross-Site Scripting (XSS) adalah kerentanan web yang memungkinkan attacker menyisipkan JavaScript berbahaya ke dalam halaman web.

                    **Jenis XSS:**
                    - Reflected XSS
                    - Stored XSS
                    - DOM-based XSS

                    **Mitigasi:**
                    - Output encoding
                    - Validasi input
                    - Content Security Policy (CSP)
                    EOT,
                'type' => 'note',
                'is_public' => false,
            ],
        ];

        DB::table('notes')->insert($notes);
    }
}
