<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('comments')->insert([
        //     'title' => 'Comment 1',
        //     'comment_text' => 'coment uno'
        // ]);
        Comment::factory()->count(30)->create();
    }
}
