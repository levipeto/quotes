<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Quotes extends Component
{
    public function render()
    {
        return view('livewire.quotes')
            ->layout('components.layouts.base');
    }
}
