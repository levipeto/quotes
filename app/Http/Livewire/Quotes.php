<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Livewire\Component;

class Quotes extends Component
{
    public $search = '';

    public function render()
    {
        return view(
            'livewire.quotes', [
            'quotes' => Quote::where('author', 'like', '%' . $this->search . '%')
                ->Orwhere('text', 'like', '%' . $this->search . '%')
                ->paginate(10)
        ])->layout('layouts.base');
    }
}
