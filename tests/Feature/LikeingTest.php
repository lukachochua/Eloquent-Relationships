<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeingTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function post_can_be_liked()
    {
        $this->actingAs(User::factory()->create());
        $post = Post::factory()->create();

        $post->like();

        $this->assertCount(1, $post->likes);
        $this->assertTrue($post->likes->contains('id', auth()->id()));
    }

    /** @test */
    public function comment_can_be_liked()
    {
        $this->actingAs(User::factory()->create());
        $comment = Comment::factory()->create();

        $comment->like();

        $this->assertCount(1, $comment->likes);
    }
}
