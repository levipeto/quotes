<?php

namespace Tests\Feature;

use App\Models\Quote;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_read_quote_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Quote');
    }

    /** @test */
    public function can_read_quote_from_page()
    {
        $quote = Quote::factory()->count(1)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($quote[0]->author);
    }
}
