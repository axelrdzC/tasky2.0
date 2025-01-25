<section class="bg-gradient-to-r from-indigo-100 to-indigo-50 p-8 rounded-xl shadow-md border border-indigo-300">
    <header>
        <h2 class="readable text-xl font-bold text-indigo-700">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="readable mt-2 text-sm text-indigo-600">
            {{ __('Asegurese de que su cuenta utilice una contraseña larga y segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Contraseña actual')" class="readable"/>
            <x-text-input id="current_password" name="current_password" type="password" 
            class="mt-1 block w-full bg-indigo-50 border border-indigo-300 rounded-md" autocomplete="current-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña nueva')" class="readable"/>
            <x-text-input id="password" name="password" type="password" 
            class="mt-1 block w-full bg-indigo-50 border border-indigo-300 rounded-md" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="readable"ewq2/>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" 
            class="mt-1 block w-full bg-indigo-50 border border-indigo-300 rounded-md" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-900 text-white px-4 py-2 rounded-lg shadow-md">
                {{ __('Guardar cambios') }}
            </x-primary-button>
        </div>
    </form>
</section>
