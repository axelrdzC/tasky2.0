<x-app-layout>

    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Usted se encuentra en el dashboard principal, puede navegar hacia su espacio personal o grupal 
    </div>

    <div class="py-12 bg-gray-100 h-full">
        <div class="max-w-7xl mx-auto space-y-8 px-6 lg:px-8">
            <div class="readable bg-white rounded-xl shadow-md p-6 text-center">
                <h3 class="text-4xl font-bold text-gray-700">{{ __("Bienvenido a TASKY!") }}</h3>
                <p class="mt-2 text-lg text-gray-500">{{ __("Gestiona tareas, proyectos y más desde un lugar centralizado.") }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('table.index') }}" class="block">
                    <div class="readable bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white hover:animate-pulse transition duration-300">
                        <h4 class="text-xl font-bold">Espacio Personal</h4>
                        <p class="mt-2 text-sm">Organiza tus tareas personales en un espacio dedicado.</p>
                    </div>
                </a>

                <a href="{{ route('grupal.index') }}" class="block">
                    <div class="readable bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg shadow-lg p-6 text-white hover:animate-pulse transition duration-300">
                        <h4 class="text-xl font-bold">Espacio Grupal</h4>
                        <p class="mt-2 text-sm">Colabora con tu equipo y mantén todo organizado.</p>
                    </div>
                </a>
            </div>

            @auth
                @if(auth()->user()->isAdmin())
                    <div class="readable bg-gray-50 rounded-xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-700">Panel de Administración</h3>
                        <ul class="mt-4 space-y-2">
                            <li>
                                <a href="{{ route('admin.index') }}" class="block text-red-500 hover:text-red-600">Administrar Usuarios</a>
                            </li>
                        </ul>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</x-app-layout>
