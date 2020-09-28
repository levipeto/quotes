<x-layouts.base>
    <div>
        <h1>Quotes</h1>
    </div>
    <div>
        <ul>
            @foreach($quotes as $quote)
                <li>
                    "{{ $quote->text }}" - {{ $quote->author }}
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.base>
