<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_redirects_to_posts()
    {
        $response = $this->get('/');

        $response->assertRedirect(route('posts.index'));
    }

    public function test_posts_require_login()
    {
        $response = $this->get('/posts');

        $response->assertRedirect(route('login'));
    }

    public function test_login_page_loads()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
