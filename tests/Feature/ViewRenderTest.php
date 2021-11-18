<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewRenderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_login_view_can_be_rendered()
    {
        //$view = $this->view('auth.login');
        $view = $this->withViewErrors([
            'emails' => ['Please provide a valid email.']
        ])->view('auth.login');

        $view->assertSee('Email');
    }
}
