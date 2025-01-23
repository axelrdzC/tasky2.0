@extends('layouts.modales')

@section('contenido')
    
    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Usted se encuentra en la creación de una tarea, escriba en los campos lo que se pide! 
    </div>

    <!-- Botón de cerrar -->
    <a class="absolute top-3 right-3 text-gray-400 hover:text-gray-600" href="{{ route('espaciopersonal.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>

    <!-- Título -->
    <h2 class="readable text-2xl font-bold text-gray-800 mb-6 text-center">Agregar Nueva Tarea</h2>

    <!-- Formulario -->
    <form class="space-y-4" action="{{ route('task.store', ['id' => $id]) }}" method="POST">
    @csrf

        <!-- Nombre -->
        <div>
            <label for="nombre" class="readable block text-sm font-medium text-gray-700">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                maxlength="15"
                required
                value="{{ old('nombre') }}"
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <!-- Fechas -->
        <div class="grid grid-cols-2 gap-2">
            <!-- Fecha de inicio -->
            <div>
                <label for="fecha_inicio" class="readable block text-sm font-medium text-gray-700">Fecha de inicio</label>
                <input
                    type="date"
                    id="fecha_inicio"
                    name="fecha_inicio"
                    required
                    value="{{ old('fecha_inicio') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Fecha final -->
            <div>
                <label for="fecha_final" class="readable block text-sm font-medium text-gray-700">Fecha final</label>
                <input
                    type="date"
                    id="fecha_final"
                    name="fecha_final"
                    required
                    value="{{ old('fecha_final') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion" class="readable block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                maxlength="50"
                required
                value="{{ old('descripcion') }}"
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Estado -->
        <div>
            <label for="estado" class="readable block text-sm font-medium text-gray-700">Estado</label>
            <select
                id="estado"
                name="estado"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="no iniciado" {{ old('estado') == 'no iniciado' ? 'selected' : '' }}>no iniciado</option>
                <option value="iniciado" {{ old('estado') == 'iniciado' ? 'selected' : '' }}>iniciado</option>
                <option value="casi por finalizar" {{ old('estado') == 'casi por finalizar' ? 'selected' : '' }}>casi por finalizar</option>
                <option value="finalizado" {{ old('estado') == 'finalizado' ? 'selected' : '' }}>finalizado</option>
                </select>
        </div>

        <!-- Porcentaje -->
        <div>
            <label for="range" class="readable block text-sm font-medium text-gray-700">Porcentaje</label>
            <input
                name="porcentaje"
                id="range"
                type="range"
                min="0"
                max="100"
                step="1"
                value="{{ old('porcentaje', 0) }}"
                required
                class="w-full">
            <p class="text-sm text-gray-500 mt-1"><span id="valor" class="font-semibold">0</span>%</p>
        </div>

        <!-- Botón Guardar -->
        <div class="flex justify-end">
            <button
                type="submit"
                class="readable px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Guardar
            </button>
        </div>
    </form>

@endsection
