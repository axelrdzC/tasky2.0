<section class="bg-gradient-to-r from-blue-100 to-blue-50 p-8 rounded-xl shadow-md border border-blue-300">
    <style>
        .focused {
            outline: 3px solid #ff2727; /* Borde visible */
            background-color: hsla(0, 100%, 86%, 0.884); /* Fondo suave */
        }
        </style>
        
    <header>
        <h2 class="readable text-xl font-bold text-blue-700">
            {{ __('Información personal') }}
        </h2>

        <p class="readable mt-2 text-sm text-blue-600">
            {{ __("Actualiza tu nombre") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nombre')"   class="readable"/>
            <x-text-input id="name" name="name" type="text" tabindex="6" class="mt-1 block w-full bg-blue-50 border border-blue-300 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500" :value="old('name', $user->name)" required autofocus autocomplete="name" maxlength="20" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
            <x-text-input id="email" name="email" type="hidden" class="mt-1 block w-full bg-blue-50 border border-blue-300 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500" :value="old('email', $user->email)" required autocomplete="username" maxlength="62" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button tabindex="7" class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md">
                {{ __('Guardar cambios') }}
            </x-primary-button>
        </div>
    </form>
</section>
