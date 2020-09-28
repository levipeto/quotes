<x-layouts.base>
    <body class="antialiased font-sans bg-gray-200">
    <div class="" style="">
        <div>
            <!-- Background color split screen for large screens -->
            <div class="fixed top-0 left-0 w-full  h-full bg-white"></div>

            <div class="relative min-h-screen flex flex-col">
                <!-- Navbar -->
                <nav class="flex-shrink-0 bg-indigo-700">
                    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                        <div class="relative flex items-center justify-between h-16">
                            <!-- Logo section -->
                            <div class="flex items-center px-2 lg:px-0 xl:w-64">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-auto"
                                         src="https://tailwindui.com/img/logos/workflow-mark-on-brand.svg"
                                         alt="Workflow logo">
                                </div>
                            </div>

                            <!-- Search section -->
                            <div class="flex-1 flex justify-center lg:justify-end">
                                <div class="w-full px-2 lg:px-6">
                                    <label for="search" class="sr-only">Search quotes</label>
                                    <div class="relative text-indigo-300 focus-within:text-gray-400">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </div>

                                        <input wire:model="search"
                                               class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-indigo-400 bg-opacity-25 text-indigo-300 placeholder-indigo-300 focus:outline-none focus:bg-white focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                                               placeholder="Search quotes"
                                               type="text"
                                               id="search"
                                               name="search">
                                    </div>
                                </div>
                            </div>
                            <!-- Links section -->
                            <div class="hidden lg:block lg:w-80">
                                <div class="flex items-center justify-end">
                                    <div class="flex">
                                        <a href="https://github.com/levipeto/quotes" target="_blank"
                                           class="px-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-200 hover:text-white focus:outline-none focus:text-white focus:bg-indigo-600 transition duration-150 ease-in-out">Git</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- 3 column wrapper -->
                <div class="flex-grow w-full mx-auto xl:px-8 lg:flex">
                    <!-- Left sidebar & main wrapper -->
                    <div class="flex-1 min-w-0 bg-white xl:flex">
                        <!-- Account profile -->
                        <div class="xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 bg-white">
                            <div class="pl-4 pr-6 py-6 sm:pl-6 lg:pl-8 xl:pl-0">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1 space-y-8">
                                        <div
                                            class="space-y-8 sm:space-y-0 sm:flex sm:justify-between sm:items-center xl:block xl:space-y-8">
                                            <!-- Action buttons -->
                                            <div
                                                class="flex flex-col space-y-3 sm:space-y-0 sm:space-x-3 sm:flex-row xl:flex-col xl:space-x-0 xl:space-y-3">
                                                <div>
                                                    <forn wire:submit.prevent="getRandomQuote">
                                                        <input wire:click="getRandomQuote"
                                                               class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                                                               type="submit"
                                                               value="Random Quote">
                                                    </forn>
                                                </div>

                                                <div>
                                                    <forn wire:submit.prevent="getQuoteOfTheDay">
                                                        <input wire:click="getQuoteOfTheDay"
                                                               class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                                                               type="submit"
                                                               value="Quote of the Day">
                                                    </forn>
                                                </div>

                                                <div>
                                                    <form wire:submit.prevent="addQuote">
                                                        <div class="mt-6">
                                                            <label for="author"
                                                                   class="block text-sm font-medium leading-5 text-gray-700">
                                                                Author</label>
                                                            <input wire:model="author"
                                                                   type="text"
                                                                   id="author"
                                                                   name="author"
                                                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                            @error('author') <span>{{ $message }}</span> @enderror
                                                        </div>

                                                        <div class="mt-6">
                                                            <label for="text"
                                                                   class="block text-sm font-medium leading-5 text-gray-700">
                                                                Text</label>
                                                            <input wire:model="text"
                                                                   type="text"
                                                                   id="text"
                                                                   name="text"
                                                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                            @error('text') <span>{{ $message }}</span> @enderror
                                                        </div>

                                                        <div class="mt-6">
                                                            <input type="submit"
                                                                   value="Add a Quote"
                                                                   class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                                        </div>
                                                    </form>

                                                </div>
<hr/>
                                                <div>
                                                    <forn wire:submit.prevent="seedDB">
                                                        <input wire:click="seedDB"
                                                               class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                                                               type="submit"
                                                               value="Seed the Database">
                                                    </forn>
                                                </div>

                                                <div>
                                                    <forn wire:submit.prevent="deleteDB">
                                                        <input wire:click="deleteDB"
                                                               class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                                                               type="submit"
                                                               value="Empty the Database">
                                                    </forn>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Projects List -->
                        <div class="bg-white lg:min-w-0 lg:flex-1">
                            <div
                                class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
                                <div class="flex items-center">
                                    <h1 class="flex-1 text-lg leading-7 font-medium">Quotes</h1>
                                </div>
                            </div>
                            {{ $quotes->links() }}
                            <ul class="relative z-0 divide-y divide-gray-200 border-b border-gray-200" x-max="1">

                                @foreach($quotes as $quote)
                                    <li class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">
                                        <div class="flex items-center justify-between space-x-4">
                                            <!-- Repo name and link -->
                                            <div class="min-w-0 space-y-3">
                                                <div class="flex items-center space-x-3">
                                                    <span aria-label="Running"
                                                          class="h-4 w-4 bg-green-100 rounded-full flex items-center justify-center">
                                                        <span class="h-2 w-2 bg-green-400 rounded-full"></span>
                                                    </span>

                                                    <span class="block">
                                                    <h2 class="text-sm font-medium leading-5">
                                                      <a href="#">
                                                        <span class="absolute inset-0"></span>
                                                        "{{ $quote->text }}"
                                                      </a>
                                                    </h2>
                                                    </span>
                                                </div>
                                                <a href="#" class="relative group flex items-center space-x-2.5">
                                                    <div
                                                        class="text-sm leading-5 text-gray-500 group-hover:text-gray-900 font-medium truncate">
                                                        ~ {{ $quote->author }}
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="sm:hidden">
                                                <svg class="h-5 w-5 text-gray-400"
                                                     x-description="Heroicon name: chevron-right" viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- More items... -->
                        </div>
                    </div>
                </div>
            </div>

            <x-notification />

            <x-modal />
        </div>
    </div>
    </body>
</x-layouts.base>
