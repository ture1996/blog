<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::all()->each(
            function (Post $post) {
                $comments = Comment::factory(6)->create(['post_id' => $post->id]);
                $post->comments()->saveMany($comments);
            }
        );
    }
}
