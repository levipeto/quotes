<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    /** @test */
    public function can_read_quote_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Quote');
    }
}
