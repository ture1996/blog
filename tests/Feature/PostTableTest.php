<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTableTest extends TestCase
{

        /**
         * A basic unit test example.
         *
         * @return void
         */
        public function testPostCreationInPostsTable()
        {
            $user = User::factory()->create();
            $post = Post::factory()->create(['user_id' => $user->id]);

            $post->save();

            $this->assertDatabaseHas(
                'posts',
                [
                    'title' => $post->title,
                    'body' => $post->body
                ]
            );

        }

}
