<x-app-layout>

    <style>
        .focused {
            outline: 3px solid #ff2727; /* Borde visible */
            background-color: hsla(0, 100%, 86%, 0.884); /* Fondo suave */
        }
        </style>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Usted se encuentra en el espacio grupal, puede seleccionar alguno de sus espacios para empezar a trabajar
    </div>

    <div class="layout overflow-hidden">
        <div class="border-r border-indigo-500 bg-white text-white w-72 h-full overflow-hidden p-6 flex flex-col justify-between shadow-xl">
            <div>
                <!-- Logo y Título -->
                <div class="flex items-center gap-3 mb-8 text-indigo-500">
                    <h1 class="readable text-xl font-extrabold tracking-wider uppercase">Espacio Grupal</h1>
                </div>

                <!-- Espacios -->
                <div class="space-y-4">
                    @if ($espacios->isNotEmpty())
                        @foreach ($espacios as $index => $data)
                            @php
                                $espacio = $data['espacio'];
                                $isAdmin = $data['isAdmin'];
                            @endphp
                            <button
                                class="flex items-center gap-3 py-3 px-4 w-full bg-indigo-50 text-left text-indigo-500 border border-indigo-500 shadow-md hover:animate-pulse hover:shadow-lg rounded-lg transition-all duration-200"
                                onclick="loadEspacio({{ $espacio->id }}); toggleActions({{ $espacio->id }});"
                                onkeydown="handleKeydown(event, {{ $espacio->id }})"
                                tabindex="{{ $index + 1 }}"> <!-- tabindex añadido aquí -->
                                <span class="readable text-sm font-medium">{{ $espacio->nombre }}</span>
                            </button>

                            <!-- Acciones para Admin (ocultas por defecto) -->
                            @if ($isAdmin)
                                <div id="actions-{{ $espacio->id }}" class="hidden flex gap-2 mt-2">
                                    <form action="{{ route('grupal.destroy', $espacio->id) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="readable flex items-center gap-2 py-2 px-3 bg-red-500 text-white rounded-lg hover:bg-red-600 w-full transition-all duration-200"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este espacio?')"
                                            tabindex="{{ $index + 2 }}"> <!-- tabindex para el botón eliminar -->
                                            <span class="text-sm font-medium">Eliminar</span>
                                        </button>
                                    </form>
                                    <form action="{{ route('grupal.edit', $espacio->id) }}" method="GET" class="w-full">
                                        <button type="submit"
                                            class="readable flex items-center gap-2 py-2 px-3 bg-yellow-400 text-white rounded-lg hover:bg-yellow-600 w-full transition-all duration-200"
                                            tabindex="{{ $index + 3 }}"> <!-- tabindex para el botón editar -->
                                            <span class="text-sm font-medium">Editar</span>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-sm text-gray-400 text-center">No tienes espacios creados aún.</p>
                    @endif
                </div>

                <!-- Botones para Crear o Unirse a un Espacio -->
                <button type="button"
                    class="readable mt-10 bg-blue-500 text-white py-3 px-4 rounded-lg hover:bg-blue-600 w-full mb-4 transition-all duration-200"
                    onclick="openModal()" tabindex="{{ count($espacios) + 1 }}"> <!-- tabindex para el botón Crear -->
                    + Crear Espacio
                </button>
                <button type="button"
                    class="readable bg-white text-blue-500 border border-blue-500 py-3 px-4 mb-4 rounded-lg hover:bg-indigo-100 w-full transition-all duration-200"
                    onclick="openJoinModal()" tabindex="{{ count($espacios) + 2 }}"> <!-- tabindex para el botón Unirse -->
                    + Unirse a Espacio
                </button>

                <!-- Gestionar Miembros -->
                <a href="{{ route('grupal.miembros') }}"
                    class="flex items-center text-center gap-3 py-2 px-4 bg-indigo-500 rounded-lg mb-6 hover:bg-indigo-700 transition-all duration-200"
                    tabindex="{{ count($espacios) + 3 }}"> <!-- tabindex para el enlace Gestionar Miembros -->
                    <span class="readable text-sm w-full font-medium ">Gestionar Miembros</span>
                </a>

            </div>
            @if ($errors->any())
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: `{!! implode('<br>', $errors->all()) !!}`,
                            confirmButtonText: 'Entendido'
                        });
                    };
                </script>
            @endif

        </div>




        <script>

function handleKeydown(event, espacioId) {
            if (event.key === 'Enter') {
            loadEspacio(espacioId);
            toggleActions(espacioId);
            }
                }
            function toggleActions(id) {

                const actions = document.getElementById(`actions-${id}`);
                if (actions) {
                    actions.classList.toggle('hidden');
                }
            }



        </script>

        <!-- Contenido Principal -->
        <div class="main-content p-6 bg-[#2A2A42] rounded-lg shadow-lg">
            <div id="espacio-content">
                <p class="readable message text-center text-gray-400">Selecciona un espacio para ver los detalles.</p>
            </div>

            <br>

            <div class="table overflow-auto bg-[#3F3F5A] rounded-lg p-4">
                <table class="table-auto w-full text-left">
                    <thead id="tareas-header" class="text-gray-400">
                        <!-- Dinámico -->
                    </thead>
                    <tbody id="tareas-list" class="text-white">
                        <!-- Dinámico -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        function toggleActions(espacioId) {
            const actionDiv = document.getElementById(`actions-${espacioId}`);
            const allActionDivs = document.querySelectorAll('[id^="actions-"]');

            // Ocultar todas las acciones
            allActionDivs.forEach(div => {
                if (div.id !== `actions-${espacioId}`) {
                    div.classList.add('hidden');
                }
            });

            // Alternar visibilidad de las acciones seleccionadas
            if (actionDiv.classList.contains('hidden')) {
                actionDiv.classList.remove('hidden');
            } else {
                actionDiv.classList.add('hidden');
            }
        }

        function loadEspacio(id) {
            $.ajax({
                url: `/grupal/${id}`,
                type: 'GET',
                success: function(response) {
                    const espacio = response.espacio;
                    const tareas = response.tareas;

                    // Detalles del Espacio
                    $('#espacio-content').html(`
                    <div class="bg-[#3F3F5A] p-4 rounded-lg">
                        <h1 class="text-lg font-bold text-white mb-2">${espacio.nombre}</h1>
                        <p class="text-sm text-gray-300 mb-2">Categoría: ${espacio.categoria}</p>
                        <p class="text-sm text-gray-300 mb-2">Creado en: ${new Date(espacio.created_at).toLocaleDateString()}</p>
                        <p class="text-sm text-gray-300 mb-4">Código de invitación: ${espacio.id}</p>
                    </div>
                `);

                    // Encabezados de la Tabla
                    $('#tareas-header').html(`
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Fecha Inicio</th>
                        <th class="p-2">Fecha Final</th>
                        <th class="p-2">Descripción</th>
                    </tr>
                `);

                    // Lista de Tareas
                    let tareasHtml = '';
                    tareas.forEach(tarea => {
                        tareasHtml += `
                        <tr>
                            <td class="p-2">${tarea.id}</td>
                            <td class="p-2">${tarea.nombre}</td>
                            <td class="p-2">${new Date(tarea.fechainicio).toLocaleDateString()}</td>
                            <td class="p-2">${new Date(tarea.fechafinal).toLocaleDateString()}</td>
                            <td class="p-2">${tarea.descripcion}</td>
                        </tr>
                    `;
                    });
                    $('#tareas-list').html(tareasHtml);
                },
                error: function(xhr) {
                    console.error('Error al cargar los datos:', xhr);
                    alert('No se pudo cargar el espacio o las tareas. Inténtalo de nuevo.');
                }
            });
        }
    </script>


    </div>


    </div>
    <!-- Modal para ingresar el ID del espacio -->
    <div id="joinEspacioModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
    <div class="max-w-md w-full bg-white rounded-lg shadow-xl p-6 relative">
        <!-- Botón de cerrar -->
        <button
        tabindex="13" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            onclick="document.getElementById('joinEspacioModal').classList.add('hidden')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Título -->
        <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Unirse a un Espacio</h2>

        <!-- Formulario -->
        <form id="joinEspacioForm" action="{{ route('grupal.join') }}" method="POST" class="space-y-4">
            @csrf

            <!-- ID del Espacio -->
            <div>
                <label for="id_espacio" class="block text-sm font-medium text-gray-700">ID del Espacio</label>
                <input
                    type="number"
                    id="id_espacio"
                    name="id_espacio"
                    required
                    tabindex="15" class="mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Botón Unirse -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    tabindex="16" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Unirse
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openJoinModal() {
        document.getElementById('joinEspacioModal').classList.remove('hidden');
    }

    window.onclick = function (event) {
        const modal = document.getElementById('joinEspacioModal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    };
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function loadEspacio(id) {
            $.ajax({
                url: `/grupal/${id}`,
                type: 'GET',
                success: function(response) {
                    const espacio = response.espacio;
                    const tareas = response.tareas;
                    const isAdmin = response.isAdmin; // Recibe el estado del rol

                    let taskButton = '';
                    if (isAdmin) {
                        taskButton =
                            `<a href="/tareagrupal/${espacio.id}/crear" class="task">Agregar Tarea</a>`;
                    }

                    $('#espacio-content').html(`
                <div class="card">
                    <h1 class="name">${espacio.nombre}</h1>
                    <p><span class="bold">Categoría: </span>${espacio.categoria}</p>
                    <p><span class="bold">Creado en: </span>${new Date(espacio.created_at).toLocaleDateString()}</p>
                    <p><span class="bold">Código de invitación: </span>${espacio.id}</p>
                </div>
                ${taskButton} <!-- Agregar el botón solo si es admin -->
            `);

                    $('#tareas-header').html(
                        `<tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha final</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Porcentaje</th>
                    <th>Notas</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                </tr>`
                    );

                    let tareasHtml = '';
                    tareas.forEach((tarea) => {
                        let deleteButton = '';
                        if (isAdmin) {
                            deleteButton = `
                        <form action="/tareagrupal/${tarea.id}/eliminar" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');" class="eliminar">
                                Eliminar
                            </button>
                        </form>`;
                        }

                        tareasHtml += `
                    <tr>
                        <td class="cont">${tarea.id}</td>
                        <td class="cont">${tarea.nombre}</td>
                        <td class="cont">${new Date(tarea.fechainicio).toLocaleDateString()}</td>
                        <td class="cont">${new Date (tarea.fechafinal).toLocaleDateString()}</td>
                        <td class="cont">${tarea.descripcion}</td>
                        <td class="cont">${tarea.estado}</td>
                        <td class="cont">${tarea.porcentaje}</td>
                        <td class="cont">${tarea.categoria}</td>
                        <td class="cont">${tarea.responsable}</td>
                        <td>
                            <a href="/tareagrupal/${tarea.id}/editar" class="editar">Editar</a>
                            ${deleteButton} <!-- Mostrar el botón de eliminar solo si es admin -->
                        </td>
                    </tr>`;
                    });

                    $('#tareas-list').html(tareasHtml);

                    // Mostrar la funcionalidad para invitar miembros
                    $('#invite-members').show();
                    $('#space-id-hidden').val(espacio.id);
                },
                error: function(xhr) {
                    console.error('Error al cargar los datos:', xhr);
                    alert('No se pudo cargar el espacio o las tareas. Inténtalo de nuevo.');
                }
            });
        }
    </script>

    <!-- Ventana modal Crear Espacio -->

    <div id="crearEspacioModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
    <div class="max-w-md w-full bg-white rounded-lg shadow-xl p-6 relative">
        <!-- Botón de cerrar -->
        <button
        tabindex="6" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            onclick="document.getElementById('crearEspacioModal').classList.add('hidden')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Título -->
        <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Crear Espacio</h2>

        <!-- Formulario -->
        <form action="{{ route('grupal.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    maxlength="18"
                    required
                    tabindex="7" class="mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Descripción -->
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input
                    type="text"
                    id="categoria"
                    name="categoria"
                    maxlength="25"
                    required
                    tabindex="8" class="mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Botón Guardar -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    tabindex="9" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Guardar
                </button>
            </div>
        </form>


    </div>
</div>

<script>
    function openModal() {
        document.getElementById('crearEspacioModal').classList.remove('hidden');
    }

    window.onclick = function (event) {
        const modal = document.getElementById('crearEspacioModal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    };
</script>



</x-app-layout>
