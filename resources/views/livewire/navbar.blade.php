<nav class="bg-gray-800" x-data="{showMenu : false}">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click.prevent="showMenu = !showMenu " type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <a href="/"><img class="h-8 w-auto" src="{{asset('logo.png')}}" alt="Poke platform"></a>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{url('/sets')}}" wire:navigate class="{{request()->is('sets') ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"' : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'}}">Sets</a>
                        <a href="{{url('/my-collections')}}" class="{{request()->is('my-collections') ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"' : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'}}">My collections</a>
                        <a href="{{url('/trade')}}" wire:navigate class="{{request()->is('trade') ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"' : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'}}">Trade</a>

                    </div>
                </div>
            </div>
            <livewire:search-card-by-name></livewire:search-card-by-name>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                            @endif
                        @endauth
                    @endif
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="showMenu" class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <a href="{{url('/sets')}}" wire:navigate class="{{request()->is('sets') ? 'bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"' : 'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium'}}">Sets</a>
            <a href="{{url('/my-collections')}}" class="{{request()->is('my-collections') ? 'bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"' : 'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium'}}">My collections</a>
            <a href="{{url('/trade')}}" wire:navigate class="{{request()->is('trade') ? 'bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"' : 'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium'}}">Trade</a>
        </div>
    </div>
</nav>
