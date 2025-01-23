<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>tasky - Gestión Simplificada</title>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .focused {
                outline: 2px solid #ff8fa7; /* Borde visible */
                background-color: rgba(175, 76, 114, 0.2); /* Fondo suave */
            }
        </style>
    </head>

    <body class="font-sans antialiased bg-gray-200 text-gray-200">

        <!-- this is EL TEXTO A LEER X AUTOMATICO -->
        <div id="textToRead" hidden>
            Hola!, bienvenide a tasky, la herramienta más simple y poderosa para estudiantes que buscan organizar tareas y proyectos sin complicaciones.
            En la barra de navegación podrá encontrar atajos a la sección de características y acerca de, así como los botones para iniciar sesión o registrarse.

            Si se le dificulta leer, siempre puede poner el cursor sobre algún elemento y yo me encargaré de dictárselo, 
            también puede manejarse con las teclas de arriba y abajo y pulsar enter para accionar algun botón.

            Agradecemos su visita!
        </div>

        <!-- this is EL NAVBAR -->
        <header class="sticky top-0 bg-indigo-500 shadow-lg">

            <div class="container mx-auto flex items-center justify-between py-4">

                <!-- logo -->
                <a href="#" class="text-2xl font-bold text-white flex items-center gap-2">
                    <x-application-logo class="w-10 h-10 fill-current text-blue-300" />
                    <span>tasky</span>
                </a>

                <!-- links d navegacion -->
                <nav>
                    <ul class="flex space-x-4 text-white">
                        <li>
                            <a href="#features" id="hoverFeature" tabindex="2"
                            class="readable focusable px-4 py-1 hover:font-black hover:border-b-2 hover:border-white transition duration-200">
                            Características
                            </a>
                        </li>
                        <li>
                            <a href="#about" id="hoverAbout" tabindex="1"
                            class="readable px-4 py-1 hover:font-black hover:border-b-2 hover:border-white transition duration-200">
                            Acerca de
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- acciones -->
                <div class="flex space-x-4">
                    @if (Route::has('login'))
                        @auth
                            Hi!
                        @else
                            <a href="{{ route('login') }}"
                            tabindex="3"
                            class="readable rounded-md px-4 py-1 text-purple-900 bg-[#eee2df] hover:bg-gray-50 transition">
                            Iniciar sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                tabindex="4"
                                class="readable rounded-md px-4 py-1 text-indigo-900 bg-indigo-100 hover:bg-gray-50 transition">
                                Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- this is LA SECCION PRINCIPAL -->
        <section class="py-20 text-gray-800">
            <div class="container mx-auto flex flex-col lg:flex-row items-center">

                <!-- textos -->
                <div class="lg:w-1/2 mb-8 lg:mb-0 text-center lg:text-left">
                    <h1 class="readable text-5xl font-black leading-tight">
                        Organiza tu día con <span class="text-indigo-500">Tasky</span>
                    </h1>
                    <p class="readable mt-6 text-lg">
                        La herramienta más simple y poderosa para estudiantes que buscan organizar tareas y proyectos sin complicaciones.
                    </p>

                    <!-- boton principal dependiendo si hay una sesion activa -->
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                            tabindex="5"
                            class="readable mt-6 inline-block bg-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700">
                                Ir al dashboard
                            </a>
                        @else
                            <a href="#features" tabindex="6"
                            class="readable mt-6 inline-block bg-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700">
                                Descubre más
                            </a>
                        @endauth
                    @endif

                    <button onclick="toggleLectura()" id="readButton"
                    tabindex="7"
                    class="readable ms-2 mt-6 text-indigo-500 bg-gray-100 inline-block border border-indigo-500 px-6 py-3 rounded-lg shadow-md hover:bg-indigo-100">
                        Activar texto a voz
                    </button>

                </div>

                <!-- imagen -->
                <div class="lg:w-1/2">
                    <img src="{{asset('/images/organizeimagen.png') }}" alt="Imagen con varias personas organizando un proyecto"
                    class="rounded-lg max-w-full lg:max-w-md mx-auto">
                </div>
            </div>
        </section>

        <!-- this is CARACTERISITCAS D TASKY -->
        <section id="features" class="py-16">
            <div class="container mx-auto text-center">

                <h2 class="readable text-4xl font-black text-gray-800">Por qué elegir Tasky</h2>
                <p class="readable mt-4 text-gray-900">Tasky hace que la gestión de tareas sea tan sencilla como arrastrar y soltar.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">

                    <div class="readable border border-blue-600 p-6 rounded-lg transition transform hover:shadow-[0_0_20px_2px_#3b82f6]">
                        <h3 class="text-2xl font-semibold text-blue-600">Simplicidad</h3>
                        <p class="mt-4 text-gray-900">Interfaz diseñada para que cualquiera pueda empezar en minutos.</p>
                    </div>
                    <div class="readable border border-pink-600 p-6 rounded-lg transition transform hover:shadow-[0_0_20px_2px_#ec4899]">
                        <h3 class="text-2xl font-semibold text-pink-600">Colaboración</h3>
                        <p class="mt-4 text-gray-900">Invita a tus amigos y trabaja juntos en proyectos escolares.</p>
                    </div>
                    <div class="readable border border-green-600 p-6 rounded-lg transition transform hover:shadow-[0_0_20px_2px_#10b981]">
                        <h3 class="text-2xl font-semibold text-green-600">Progreso</h3>
                        <p class="mt-4 text-gray-900">Visualiza tu avance con gráficos y estadísticas intuitivas.</p>
                    </div>

                </div>

            </div>
        </section>

        <!-- this is SOBRE TASKY -->
        <section id="about" class="py-16 text-gray-900">
            <div class="container mx-auto flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2">
                    <img src="{{asset('/images/workspaceimage.png') }}" alt="workspace Image" class="rounded-lg">
                </div>
                <div class="lg:w-1/2 lg:pl-16 mt-8 lg:mt-0">
                    <h2 class="readable text-4xl font-semibold">Acerca de Tasky</h2>
                    <p class="readable mt-6 leading-relaxed">
                        Diseñada pensando en estudiantes, Tasky combina herramientas poderosas con una interfaz amigable y accesible. Desde tareas individuales hasta proyectos colaborativos, lo tendrás todo organizado.
                    </p>
                    <a href="#contact" tabindex="8" 
                    class="readable focused mt-6 inline-block bg-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700">
                        Contáctanos
                    </a>
                </div>
            </div>
        </section>

        <!-- this is EL PIE D PAGINA -->
        <footer class="bg-[#1E0579] text-gray-200 py-6">
            <div class="readable container mx-auto text-center">
                <p>&copy; {{ date('Y') }} Tasky. Todos los derechos reservados.</p>
            </div>
        </footer>

    </body>
</html>
