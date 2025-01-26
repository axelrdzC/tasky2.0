<section class="bg-gradient-to-r from-red-100 to-red-50 p-8 rounded-xl shadow-md border border-red-300">
    <style>
        .focused {
            outline: 3px solid #ff2727; /* Borde visible */
            background-color: hsla(0, 100%, 86%, 0.884); /* Fondo suave */
        }
        </style>
    <header>
        <h2 class="readable text-xl font-bold text-red-700">
            {{ __('Eliminar cuenta') }}
        </h2>

        <p class="readable mt-2 text-sm text-red-600">
            {{ __('Una vez que elimine su perfil, todos los datos relacionados seran eliminados. Antes de proceder, asegurese de tener un resplado de su informacion.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        tabindex="6"
        class="bg-red-600 hover:bg-red-900 text-white font-semibold rounded-lg mt-6 px-4 py-2"
    >
        {{ __('Eliminar cuenta') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white rounded-lg shadow-md">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    tabindex="7"
                    class="mt-1 block w-full bg-red-50 border border-red-300 rounded-md focus:ring focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    tabindex="7"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg px-4 py-2"
                >
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ml-3 bg-red-600 hover:bg-red-700 text-white rounded-lg px-4 py-2">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
