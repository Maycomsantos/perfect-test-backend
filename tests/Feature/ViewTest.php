<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('sales/create');
        $response = $this->get('dashboard');
        $response = $this->get('products/create');

        $response->assertStatus(200);
    }

    public function quick()
    {
        $this->assertTrue(true);
    }
}
