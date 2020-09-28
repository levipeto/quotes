<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Livewire\Component;

class Quotes extends Component
{
    public function render()
    {
        return view('livewire.quotes', [
            'quotes' => Quote::all()
        ])->layout('components.layouts.base');
    }
}
