<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entre a tasky</title>
    
    <style>
        .focused {
            outline: 2px solid #ff8fa7; /* Borde visible */
            background-color: rgba(175, 76, 114, 0.2); /* Fondo suave */
        }
    </style>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Bienvenido a la página de inicio de sesión, ingrese sus datos para empezar a gestionar sus tareas!
    </div>

    <div class="flex flex-col md:flex-row rounded-xl overflow-hidden max-w-6xl w-full h-[600px]">
        
        <!-- this is EL FORM -->
        <div class="flex items-center justify-center p-14 flex-1">
            <div class="w-full max-w-md p-10 rounded-xl">
                <h2 class="readable text-4xl font-bold mb-8 text-gray-900">Iniciar sesión</h2>
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="readable block text-m font-medium text-gray-500">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            tabindex="1"
                            required
                            class="mt-2 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-lg"
                        />
                    </div>

                    <div>
                        <label for="password" class="readable block text-m font-medium text-gray-500">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            tabindex="2"
                            required
                            class="mt-2 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-lg"
                        />
                    </div>

                    <div class="readable text-center text-gray-500 text-sm">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}" tabindex="3"  class="text-indigo-500 hover:underline">Regístrate</a>
                    </div>

                    <button type="submit" tabindex="4"
                        class="readable readable w-full bg-indigo-500 text-white py-2 px-4 rounded-lg shadow-md hover:opacity-90 focus:ring-4 focus:ring-offset-2 text-lg font-semibold transition">
                        Iniciar sesión
                    </button>
                </form>

                <button onclick="toggleLectura()" id="readButton" tabindex="7"
                    class="readable w-full mt-4 text-indigo-500 py-2 px-4 bg-gray-100 border border-indigo-500 rounded-lg shadow-md hover:bg-indigo-100">
                    Activar texto a voz
                </button>

            </div>
        </div>

        <!-- this is LA IMAGEN -->
        <div class="flex items-center justify-center p-12 flex-1">
            <img src="{{ asset('images/login.png') }}" alt="Persona trabajando" class="w-[500px] h-auto rounded-lg">
        </div>

    </div>
</body>
</html>
