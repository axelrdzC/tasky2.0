@extends('layouts.modales')

@section('contenido')
    
    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Usted se encuentra en la edición de una tarea, actualice los campos que necesite! 
    </div>

    <!-- Botón de cerrar -->
    <a class="absolute top-3 right-3 text-gray-400 hover:text-gray-600" href="{{ route('espaciopersonal.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>

    <!-- Título -->
    <h2 class="readable text-3xl font-bold text-gray-800 mb-6 text-center">Editar Tarea</h2>

    <!-- Formulario -->
    <form action="{{ route('task.update', $tarea->id) }}" method="POST" class="space-y-4">
        
        @csrf @method('PUT')

        <!-- Nombre -->
        <div>
            <label for="nombre" class="readable block text-sm font-medium text-gray-850">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $tarea->nombre) }}"
                maxlength="15"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="grid grid-cols-2 gap-2">
            <!-- Fecha de inicio -->
            <div>
                <label for="fecha_inicio" class="readable block text-sm font-medium text-gray-850">Fecha de inicio</label>
                <input
                    type="date"
                    id="fecha_inicio"
                    name="fecha_inicio"
                    value="{{ old('fecha_inicio', $tarea->fecha_inicio ? \Carbon\Carbon::parse($tarea->fecha_inicio)->format('Y-m-d') : '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Fecha final -->
            <div>
                <label for="fecha_final" class="readable block text-sm font-medium text-gray-850">Fecha final</label>
                <input
                    type="date"
                    id="fecha_final"
                    name="fecha_final"
                    value="{{ old('fecha_final', $tarea->fecha_final ? \Carbon\Carbon::parse($tarea->fecha_final)->format('Y-m-d') : '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion" class="readable block text-sm font-medium text-gray-850">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                maxlength="50"
                value="{{ old('descripcion', $tarea->descripcion) }}"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Estado -->
        <div>
            <label for="estado" class="readable block text-sm font-medium text-gray-850">Estado</label>
            <select
                id="estado"
                name="estado"
                required
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="no iniciado" {{ $tarea->estado === 'no iniciado' ? 'selected' : '' }}>No iniciado</option>
                <option value="iniciado" {{ $tarea->estado === 'iniciado' ? 'selected' : '' }}>Iniciado</option>
                <option value="casi por finalizar" {{ $tarea->estado === 'casi por finalizar' ? 'selected' : '' }}>Casi por finalizar</option>
                <option value="finalizado" {{ $tarea->estado === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>

        <!-- Porcentaje -->
        <div>
            <label for="range" class="readable block text-sm font-medium text-gray-700">Porcentaje</label>
            <input
                type="range"
                id="range"
                name="porcentaje"
                value="{{ old('porcentaje', $tarea->porcentaje) }}"
                min="0"
                max="100"
                step="1"
                class="w-full mt-1">
            <p class="text-sm text-gray-500 mt-1"><span id="valor" class="font-semibold">0</span>%</p>
        </div>

        <!-- Botón Actualizar -->
        <div>
            <button
                type="submit"
                class="readable w-full bg-blue-600 text-white py-2 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Actualizar
            </button>
        </div>
    </form>

@endsection