<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Livewire\Component;

class Quotes extends Component
{
    public $search = '';
    public $author;
    public $text;

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
}
