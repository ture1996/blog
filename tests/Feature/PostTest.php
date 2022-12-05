<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGettingOfPosts()
    {
        $response = $this->get('/posts');

        $response->assertSuccessful();
    }

    public function testCreatePostPage(){

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts/create');

        $response->assertOk();

    }

    public function testCreatePostPageWithoutAuthenticatedUser(){

        $response = $this->get('/posts/create') ;

        $response->assertRedirect('/login');

    }

    public function testCreationOfPost(){

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/posts', ['title'=>'testing post title', 'body'=>'testing post body']
        ) ;

        $response->assertRedirect('/posts');

    }
}
