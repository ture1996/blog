<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Mail\CommentReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSendingOfMailForCreatedComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        Mail::fake();

        $this->actingAs($user)->post(
            "posts/{$post->id}/comments",
            [
                'body' => 'This is some comment'
            ]
            );


            Mail::assertSent(CommentReceived::class);

    }
}
