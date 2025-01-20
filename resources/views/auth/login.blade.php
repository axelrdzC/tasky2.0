<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .focused {
            outline: 2px solid #ff8fa7; /* Borde visible */
            background-color: rgba(175, 76, 114, 0.2); /* Fondo suave */
        }
    </style>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="flex flex-col md:flex-row rounded-xl overflow-hidden max-w-6xl w-full h-[600px]">
        <div class="flex items-center justify-center p-14 flex-1">
            <div class="w-full max-w-md p-10 rounded-xl">
                <h2 class="text-4xl font-bold mb-8 text-gray-900">Iniciar sesión</h2>
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-m font-medium text-gray-500">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="example@mail.com"
                            tabindex="1"
                            required
                            class="mt-2 block w-full px-5 py-3 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focyellowr95r-green-500 shadow-sm text-lg"
                        />
                    </div>

                    <div>
                        <label for="password" class="block text-m font-medium text-gray-500">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            tabindex="2"
                            required
                            class="mt-2 block w-full px-5 py-3 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm text-lg"
                        />
                    </div>

                    <div class="text-center text-gray-500 text-sm">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}" tabindex="3"  class="text-indigo-500 hover:underline">Regístrate</a>
                    </div>

                    <button
                        type="submit"
                         tabindex="4"
                        class="w-full bg-indigo-500 text-white py-3 px-6 rounded-lg hover:opacity-90 focus:ring-4 focus:ring-offset-2 text-lg font-semibold transition">
                        Log In
                    </button>
                </form>
            </div>
        </div>

        <div class="flex items-center justify-center p-12 flex-1">
            <img src="{{ asset('images/login.png') }}" alt="Persona trabajando" class="w-[500px] h-auto rounded-lg">
        </div>

        <script>
            // Obtén todos los elementos con tabindex
            const focusableElements = Array.from(document.querySelectorAll("[tabindex]"));
            let currentIndex = 0; // Índice del elemento seleccionado actualmente

            document.addEventListener("keydown", (event) => {
                if (event.key === "ArrowDown") {
                    // Mover hacia abajo
                    currentIndex = (currentIndex + 1) % focusableElements.length; // Avanza al siguiente elemento
                    focusableElements[currentIndex].focus(); // Pone el foco
                } else if (event.key === "ArrowUp") {
                    // Mover hacia arriba
                    currentIndex = (currentIndex - 1 + focusableElements.length) % focusableElements.length; // Retrocede al elemento anterior
                    focusableElements[currentIndex].focus(); // Pone el foco
                }
            });
        </script>

    </div>
</body>
</html>
