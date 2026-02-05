<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm h-[80px] flex items-center">
    <!-- Primary Navigation Menu -->
    <div class="max-w-[1400px] w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('img/logo-nikitos.png') }}" class="block h-12 w-auto" alt="Nikitos" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex mx-auto">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-gray-900 font-bold' : 'text-gray-500 font-medium' }} border-b-0 hover:text-nikitos-orange transition duration-150 ease-in-out flex items-center">
                    Productos
                </a>
                <a href="{{ route('orders.history') }}" class="{{ request()->routeIs('orders.history') ? 'text-gray-900 font-bold' : 'text-gray-500 font-medium' }} border-b-0 hover:text-nikitos-orange transition duration-150 ease-in-out flex items-center">
                    Histórico de pedido
                </a>
                <a href="{{ route('prices.index') }}" class="{{ request()->routeIs('prices.index') ? 'text-gray-900 font-bold' : 'text-gray-500 font-medium' }} border-b-0 hover:text-nikitos-orange transition duration-150 ease-in-out flex items-center">
                    Lista de precios
                </a>
            </div>

            <!-- User Menu Button -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-6 py-2 border border-nikitos-orange text-sm leading-4 font-medium rounded-full text-nikitos-orange bg-white hover:bg-orange-50 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden absolute top-20 left-0 right-0 bg-white shadow-lg border-t z-50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Productos
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('orders.history')" :active="request()->routeIs('orders.history')">
                Histórico de pedido
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('prices.index')" :active="request()->routeIs('prices.index')">
                Lista de precios
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>