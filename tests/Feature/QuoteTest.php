<?php

namespace Tests\Feature;

use App\Models\Quote;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Livewire\Livewire;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    use RefreshDatabase;

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

    /**
     * @test
     */
    function can_search_quotes()
    {
        Livewire::test('quotes')
            ->set('author', 'Foo')
            ->set('text', 'Bar')
            ->call('addQuote');

        $this->assertTrue(Quote::whereAuthor('Foo')->exists());
        $this->assertTrue(Quote::whereText('Bar')->exists());
    }

    /**
     * @test
     */
    function author_is_required()
    {
        Livewire::test('quotes')
            ->set('author', '')
            ->set('text', 'Bar')
            ->call('addQuote')
            ->assertHasErrors(['author' => 'required']);

    }

    /**
     * @test
     */
    function text_is_required()
    {
        Livewire::test('quotes')
            ->set('author', 'Foo')
            ->set('text', '')
            ->call('addQuote')
            ->assertHasErrors(['text' => 'required']);
    }
}
