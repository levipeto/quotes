<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class Quotes extends Component
{
    public $search = '';
    public $author;
    public $text;
    public $randomQuote = '';
    public $quoteOfTheDay = '';
    public $quoteAdded = false;

    public function render()
    {
        return view(
            'livewire.quotes', [
            'quotes' => Quote::where('author', 'like', '%' . $this->search . '%')
                ->Orwhere('text', 'like', '%' . $this->search . '%')
                ->paginate(7)
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

        $this->dispatchBrowserEvent('notify', ['Quote has been Added']);
    }

    /**
     * @return void
     */
    public function getRandomQuote()
    {
        $quotes = Quote::all();

        if ($quotes->count()){
            $randomQuote = $quotes->random();
            $this->randomQuote = $randomQuote->text . ' - ' . $randomQuote->author;
        } else {
            $this->dispatchBrowserEvent('notify', ['There aren\'t any quotes to choose from!']);
        }

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
            $this->dispatchBrowserEvent('notify', ['There is no quote for today!']);
        }
    }

    /**
     * @return void
     */
    public function seedDB()
    {
        Artisan::call('db:seed');
    }

    /**
     * @return void
     */
    public function deleteDB()
    {
        Artisan::call('migrate:fresh');
    }
}
