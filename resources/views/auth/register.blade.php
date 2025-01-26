<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrese</title>
    <style>
        .focused {
            outline: 3px solid #ff2727; /* Borde visible */
            background-color: hsla(0, 100%, 86%, 0.884); /* Fondo suave */
        }
        </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">

    <!-- this is EL TEXTO A LEER X AUTOMATICO -->
    <div id="textToRead" hidden>
        Bienvenido a la página de registro, ingrese sus datos para empezar a gestionar sus tareas!
    </div>

    <div class="flex flex-col md:flex-row rounded-xl overflow-hidden max-w-6xl w-full h-auto">

        <div class="flex items-center justify-center flex-1 p-3 md:p-4">
            <img src="images/Register.png" alt="Persona trabajando"
                class="max-w-[350px] md:max-w-[350px] w-full h-auto rounded-lg">
        </div>

        <div class="flex items-center justify-center p-15 md:p-10 flex-1">
            <div class="w-full max-w-md rounded-lg">
                <h2 class="readable text-4xl font-bold mb-8 text-gray-900">Registrese</h2>
                <form method="POST" action="{{ route('register') }}" class="space-y-3">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" class="readable block text-m font-medium text-gray-500"/>
                            <x-text-input id="name" name="name" type="text" :value="old('name')" maxlength="20" required autofocus
                                autocomplete="name"
                                tabindex="1"
                                class="focused mt-1 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm" />
                            <x-input-error :messages="$errors->get('name')"  class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="apellidos" :value="__('Apellidos')" class="readable block text-m font-medium text-gray-500"/>
                            <x-text-input id="apellidos" name="apellidos" type="text" :value="old('apellidos')" maxlength="15" required
                                autofocus autocomplete="apellidos"
                                tabindex="2"
                                class="mt-1 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm" />
                            <x-input-error :messages="$errors->get('apellidos')" class="mt-1" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="user_name" :value="__('User name')" class="readable block text-m font-medium text-gray-500"/>
                            <x-text-input id="user_name" name="user_name" type="text" :value="old('user_name')" maxlength="15" required
                                autofocus autocomplete="user_name"
                                tabindex="4"
                                class="mt-1 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm text-sm" />
                            <x-input-error :messages="$errors->get('user_name')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" class="readable block text-m font-medium text-gray-500"/>
                            <x-text-input id="email" name="email" type="email" :value="old('email')" maxlength="62" required
                                autocomplete="email"
                                tabindex="5"
                                class="mt-1 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm text-sm" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="readable block text-m font-medium text-gray-500"/>
                            <x-text-input id="password" name="password" type="password" required
                                autocomplete="new-password"
                                tabindex="6"
                                class="mt-1 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm text-sm" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="readable block text-m font-medium text-gray-500"/>
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                                autocomplete="new-password"
                                tabindex="7"
                                class="mt-1 block w-full px-2 py-2 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm text-sm" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>

                    <div class="readable text-center text-gray-500 text-sm">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" tabindex="8" class="text-indigo-500 hover:underline">Inicia sesión</a>
                    </div>

                    <div>
                        <button
                        tabindex="9"
                            class="readable readable w-full bg-indigo-500 text-white py-2 px-4 rounded-lg shadow-md hover:opacity-90 focus:ring-4 focus:ring-offset-2 text-lg font-semibold transition">
                            {{ __(key: 'Registrate') }}
                        </button>
                    </div>
                </form>

                <button onclick="toggleLectura()" id="readButton" tabindex="7"
                    class="readable w-full mt-4 text-indigo-500 py-2 px-4 bg-gray-100 border border-indigo-500 rounded-lg shadow-md hover:bg-indigo-100">
                    Activar texto a voz
                </button>

            </div>
        </div>

    </div>
</body>

</html>
