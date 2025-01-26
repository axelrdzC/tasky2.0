git<nav x-data="{ open: false }" class="sticky top-0 bg-indigo-500 shadow-lg">

    <!-- navbar primaria -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo y navegación -->
            <div class="flex items-center">
                <!-- logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="readable text-2xl font-extrabold text-white hover:text-indigo-200 transition-colors duration-300">
                        tasky
                    </a>
                </div>

                <!-- links d navegacion -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex text-white">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="readable text-white text-lg font-medium hover:text-white transition-colors duration-300">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Botón de texto a voz y dropdown -->
            <div class="flex items-center space-x-4">

                <!-- btn de manual -->
                <a href="{{ route('manual') }}"
                    tabindex="7"
                    class="readable text-indigo-500 bg-gray-100 inline-block border border-indigo-500 px-4 py-1 rounded-md hover:bg-indigo-100">
                    ?
                </a>

                <!-- btn de text to speech -->
                <button onclick="toggleLectura()" id="readButton"
                    tabindex="7"
                    class="readable text-indigo-500 bg-gray-100 inline-block border border-indigo-500 px-4 py-1 rounded-md hover:bg-indigo-100">
                    Activar texto a voz
                </button>

                <!-- dropdown d opciones -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="readable inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white hover:bg-indigo-300 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-300">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="readable text-gray-200 hover:text-blue-300 transition-colors duration-300">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="readable text-gray-200 hover:text-blue-300 transition-colors duration-300">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- menu hamburger (cuando la pantalla se hace pequena) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 focus:text-gray-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- navbar, menu responsivo -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-300 transition-colors duration-300">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-800">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-blue-300 transition-colors duration-300">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white hover:text-blue-300 transition-colors duration-300">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

</nav>
