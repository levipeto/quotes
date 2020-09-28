<x-layouts.base>
    <div>
        <h1>Quotes</h1>
    </div>
    <div>
        <label for="search"></label>
        <input wire:model="search" type="text" placeholder="Search ..." id="search"/>
        <ul>
            @foreach($quotes as $quote)
                <li>
                    "{{ $quote->text }}" - {{ $quote->author }}
                </li>
            @endforeach
        </ul>
        {{ $quotes->links() }}
    </div>
</x-layouts.base>
