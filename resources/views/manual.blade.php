<x-app-layout>

    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Usted se encuentra en el manual de usuario
    </div>

    <div class="py-12 bg-gray-100 h-full">
        <div class="max-w-7xl mx-auto space-y-8 px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6 py-10 text-center">
                <h3 class="readable text-4xl font-bold text-gray-700">{{ __("Manual de usuario") }}</h3>
                <p class="readable mt-2 text-lg text-gray-500 mb-6">{{ __("Descubra la informacion necesaria para potenciar el uso de TASKY.") }}</p>

                <div x-data="{ openSection: null }" class="space-y-4">

                    <!-- Sección 1 -->
                    <div>
                        <button
                            @click="openSection === 1 ? openSection = null : openSection = 1"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            1. Registro
                        </button>
                        <div x-show="openSection === 1" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>Ingresa a la página principal y haz clic en "Register".</p>
                            <p>Completa los campos requeridos:</p>
                            <ul class="list-disc list-inside">
                                <li>Nombre</li>
                                <li>Apellidos</li>
                                <li>Nombre de usuario</li>
                                <li>Correo electrónico</li>
                                <li>Contraseña</li>
                            </ul>
                            <p>Presiona el botón "Registrar". Una vez creada la cuenta, se te redirigirá al menú dentro del sistema.</p>
                        </div>
                    </div>

                <!-- parte dos -->
                <x-manual-parts key="2. Iniciar Sesión">
                    Si ya se tiene una cuenta creada, realiza lo siguiente:<br>
                    1. En la página principal, selecciona "Login".<br>
                    2. Ingresa tu correo electrónico y contraseña.<br>
                    3. Haz clic en "Entrar" para acceder a tu cuenta.<br>
                </x-manual-parts>


                <!-- parte tres -->
                <x-manual-parts key="3. Menú">
                    En el menú principal de Tasky se tendrá de manera muy intuitiva dos secciones u
                    opciones las cuales son para poder crear tu espacio personal
                    y la otra opción para poder crear tu espacio de trabajo.
                </x-manual-parts>

                <!-- parte cuatro -->
                <x-manual-parts key="4. Espacio Personal">
                    Crear un Espacio Personal:<br>
                    - Da click a  la sección "Espacios Personales" desde el menú principal.<br>
                    - Haz clic en "Crear Espacio".<br>
                    - Proporciona un nombre y una categoría para el espacio.<br>
                    - Guarda los cambios.<br><br>
                    Editar un Espacio Personal:<br>
                    - Selecciona el espacio deseado.<br>
                    - Haz clic en "Editar", realiza los cambios y guarda.<br><br>
                    Eliminar Espacio Personal:<br>
                    - Selecciona el espacio a eliminar.<br>
                    - Da click en eliminar para eliminar el espacio personal.
                </x-manual-parts>

                <!-- parte cinco -->
                <x-manual-parts key="5. Tareas Personales">
                    Crear Tarea:<br>
                    - Entra en un espacio personal.<br>
                    - Haz clic en "Nueva Tarea".<br>
                    - Llena los campos: nombre, fecha de inicio, fecha de finalización, estado, descripción y porcentaje.<br>
                    - Guarda la tarea.<br><br>
                    Editar tarea:<br>
                    - Selecciona la tarea.<br>
                    - Haz clic en "Editar", realiza los cambios y guarda.<br><br>
                    Eliminar Tarea Persona:<br>
                    - Elige la tarea a eliminar.<br>
                    - Da click en eliminar para eliminar la tarea personal.
                </x-manual-parts>

                <!-- parte seis -->
                <x-manual-parts key="6. Grupo de Trabajo">
                    Crear un Grupo:<br>
                    1. En el menú principal da click en la sección "Espacio grupal".<br>
                    2. Haz clic en "Crear Espacio".<br>
                    3. Llena los campos: nombre, descripción.<br>
                    4. Guarda el grupo.<br><br>
                    Editar un grupo(Solamente el creador del grupo podrá editarlo):<br>
                    1. Selecciona un grupo o espacio a editar.<br>
                    2. Haz click en editar, realiza los cambios y guarda.<br><br>
                    Unirte a un Grupo:<br>
                    1. Da click en “Unirse a espacio”.<br>
                    2. Introduce el código del grupo en el campo correspondiente y presiona "Unirse".<br>
                    Eliminar Espacio Grupal:<br>
                    1. Selecciona el espacio a eliminar.<br>
                    2. Da click en eliminar para eliminar el espacio grupal.<br>
                </x-manual-parts>

                 <!-- parte siete -->
                 <x-manual-parts key="7. Tareas Grupales">
                    Crear Tarea Grupal(Solo podrá ser creada por el creador del espacio grupal):<br>
                    1. Entra en un grupo de trabajo.<br>
                    2. Haz clic en "Nueva Tarea".<br>
                    3. Completa los campos: nombre, fechas, descripción, estado, porcentaje, categoría y responsable.<br>
                    4. Guarda la tarea.<br><br>
                    Editar Tarea Grupal(La Tarea podrá ser editada tanto el creador del grupo como el miembro de este para ir agregando el estado y progreso de esta misma):<br>
                    1. Selecciona la tarea.<br>
                    2. Haz clic en "Editar", realiza los cambios y guarda.<br>
                </x-manual-parts>
                    <!-- Sección 2 -->
                    <div>
                        <button
                            @click="openSection === 2 ? openSection = null : openSection = 2"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            2. Iniciar Sesión
                        </button>
                        <div x-show="openSection === 2" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>Si ya se tiene una cuenta creada, realiza lo siguiente:</p>
                            <ol class="list-decimal list-inside">
                                <li>En la página principal, selecciona "Login".</li>
                                <li>Ingresa tu correo electrónico y contraseña.</li>
                                <li>Haz clic en "Entrar" para acceder a tu cuenta.</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Sección 3 -->
                    <div>
                        <button
                            @click="openSection === 3 ? openSection = null : openSection = 3"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            3. Menú
                        </button>
                        <div x-show="openSection === 3" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                En el menú principal de Tasky se tendrá de manera muy intuitiva dos secciones u
                                opciones las cuales son para poder crear tu espacio personal
                                y la otra opción para poder crear tu espacio de trabajo.
                            </p>
                        </div>
                    </div>

                    <!-- Sección 4 -->
                    <div>
                        <button
                            @click="openSection === 4 ? openSection = null : openSection = 4"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            4. Espacio Personal
                        </button>
                        <div x-show="openSection === 4" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                Crear un Espacio Personal:<br>
                                - Da click a  la sección "Espacios Personales" desde el menú principal.<br>
                                - Haz clic en "Crear Espacio".<br>
                                - Proporciona un nombre y una categoría para el espacio.<br>
                                - Guarda los cambios.<br><br>
                                Editar un Espacio Personal:<br>
                                - Selecciona el espacio deseado.<br>
                                - Haz clic en "Editar", realiza los cambios y guarda.<br><br>
                                Eliminar Espacio Personal:<br>
                                - Selecciona el espacio a eliminar.<br>
                                - Da click en eliminar para eliminar el espacio personal.
                            </p>
                        </div>
                    </div>

                    <!-- Sección 5 -->
                    <div>
                        <button
                            @click="openSection === 5 ? openSection = null : openSection = 5"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            5. Tareas Personales
                        </button>
                        <div x-show="openSection === 5" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                Crear Tarea:<br>
                                - Entra en un espacio personal.<br>
                                - Haz clic en "Nueva Tarea".<br>
                                - Llena los campos: nombre, fecha de inicio, fecha de finalización, estado, descripción y porcentaje.<br>
                                - Guarda la tarea.<br><br>
                                Editar tarea:<br>
                                - Selecciona la tarea.<br>
                                - Haz clic en "Editar", realiza los cambios y guarda.<br><br>
                                Eliminar Tarea Persona:<br>
                                - Elige la tarea a eliminar.<br>
                                - Da click en eliminar para eliminar la tarea personal.
                            </p>
                        </div>
                    </div>

                    <!-- Sección 6 -->
                    <div>
                        <button
                            @click="openSection === 6 ? openSection = null : openSection = 6"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            6. Grupo de Trabajo
                        </button>
                        <div x-show="openSection === 6" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                Crear un Grupo:<br>
                                1. En el menú principal da click en la sección "Espacio grupal".<br>
                                2. Haz clic en "Crear Espacio".<br>
                                3. Llena los campos: nombre, descripción.<br>
                                4. Guarda el grupo.<br><br>
                                Editar un grupo(Solamente el creador del grupo podrá editarlo):<br>
                                1. Selecciona un grupo o espacio a editar.<br>
                                2. Haz click en editar, realiza los cambios y guarda.<br><br>
                                Unirte a un Grupo:<br>
                                1. Da click en “Unirse a espacio”.<br>
                                2. Introduce el código del grupo en el campo correspondiente y presiona "Unirse".<br>
                                Eliminar Espacio Grupal:<br>
                                1. Selecciona el espacio a eliminar.<br>
                                2. Da click en eliminar para eliminar el espacio grupal.<br>
                            </p>
                        </div>
                    </div>

                    <!-- Sección 7 -->
                    <div>
                        <button
                            @click="openSection === 7 ? openSection = null : openSection = 7"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            7. Tareas Grupales
                        </button>
                        <div x-show="openSection === 7" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                Crear Tarea Grupal(Solo podrá ser creada por el creador del espacio grupal):<br>
                                1. Entra en un grupo de trabajo.<br>
                                2. Haz clic en "Nueva Tarea".<br>
                                3. Completa los campos: nombre, fechas, descripción, estado, porcentaje, categoría y responsable.<br>
                                4. Guarda la tarea.<br><br>
                                Editar Tarea Grupal(La Tarea podrá ser editada tanto el creador del grupo como el miembro de este para ir agregando el estado y progreso de esta misma):<br>
                                1. Selecciona la tarea.<br>
                                2. Haz clic en "Editar", realiza los cambios y guarda.<br>
                            </p>
                        </div>
                    </div>

                    <!-- Sección 8 -->
                    <div>
                        <button
                            @click="openSection === 8 ? openSection = null : openSection = 8"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            8. Gestión de Miembros del Grupo
                        </button>
                        <div x-show="openSection === 8" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                1. En tu espacio grupal, entra a “Gestionar miembros” ubicado en la barra lateral.<br>
                                2. Gestiona a tus miembros ya sea visualizando y eliminando miembros según sea necesario.<br>
                            </p>
                        </div>
                    </div>

                    <!-- Sección 9 -->
                    <div>
                        <button
                            @click="openSection === 9 ? openSection = null : openSection = 9"
                            class="readable w-full text-left bg-indigo-100 text-indigo-700 font-bold py-2 px-4 rounded-md hover:bg-indigo-200">
                            9. Administración de Usuarios
                        </button>
                        <div x-show="openSection === 9" class="readable mt-1 pl-4 text-left bg-gray-50 border-l-4 border-indigo-300 p-4 rounded-md">
                            <p>
                                1. Accede a la sección "Administrar Usuarios" (solo disponible para administradores) ubicado en la parte inferior en el menú principal.<br>
                                2. Visualiza, edita o elimina usuarios según sea el caso.<br>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
