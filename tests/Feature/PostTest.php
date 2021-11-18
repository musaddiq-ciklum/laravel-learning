<?php

namespace Tests\Feature;

//use App\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_post_can_be_added()
    {
        $title = 'New Post'.random_int(1,100). 'Title';
        $post = [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'contents' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ];

        $user = User::factory()->create();
        $user->assignRole('admin');

        $response = $this->actingAs($user)
            ->post('/admin/posts/store',$post)
            ->assertStatus(302)
            ->assertSessionHas('success');

        $this->assertEquals(session('success'),'added');
    }
}
