<x-layouts.base>
    <div>
        <h1>Quotes</h1>
    </div>

    <div>
        @if (session()->has('message'))
            <div class="alert">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div>
        <forn wire:submit.prevent="getRandomQuote">
            <input wire:click="getRandomQuote"
                   type="submit"
                   value="Random">
        </forn>
        {{ $randomQuote}}
    </div>

    <div>
        <forn wire:submit.prevent="getQuoteOfTheDay">
            <input wire:click="getQuoteOfTheDay"
                   type="submit"
                   value="Quote of the Day">
        </forn>
        {{ $quoteOfTheDay}}
    </div>

    <div>
        <form wire:submit.prevent="addQuote">
            <div>
                <label for="author">Author</label>
                <input wire:model="author"
                       type="text"
                       id="author"
                       name="author">
                @error('author') <span>{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="text">Text</label>
                <input wire:model="text"
                       type="text"
                       id="text"
                       name="text">
                @error('text') <span>{{ $message }}</span> @enderror
            </div>
            <input type="submit" value="addQuote">
        </form>
    </div>
    <div>
        <label for="search"></label>
        <input wire:model="search"
               type="text"
               placeholder="Search ..."
               id="search"
               name="search"
        />
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
