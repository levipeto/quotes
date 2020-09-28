<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Illuminate\Support\Carbon;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class Quotes extends Component
{
    public $search = '';
    public $author;
    public $text;
    public $randomQuote = '';
    public $quoteOfTheDay = '';

    public function render()
    {
        return view(
            'livewire.quotes', [
            'quotes' => Quote::where('author', 'like', '%' . $this->search . '%')
                ->Orwhere('text', 'like', '%' . $this->search . '%')
                ->paginate(10)
        ])->layout('layouts.base');
    }

    /**
     * @return void
     */
    public function addQuote()
    {
        $data = $this->validate(
            [
                'author' => 'required',
                'text' => 'required',
            ]);

        Quote::create(
            [
                'author' => $data['author'],
                'text' => $data['text'],
            ]);

        $this->author = "";
        $this->text = "";
    }

    /**
     * @return void
     */
    public function getRandomQuote()
    {
        $quote = Quote::all()->random();
        $this->randomQuote = $quote->text . ' - ' . $quote->author;
    }

    /**
     * @return void
     */
    public function getQuoteOfTheDay()
    {
        $today = Carbon::now()->day;
        $quote = Quote::find($today);

        if (($quote) != null){
            $this->quoteOfTheDay = "The quote of the day is " . $quote->text . ' - ' . $quote->author;
        } else {
            session()->flash('message', 'There is no quote for today');
        }
    }
}
