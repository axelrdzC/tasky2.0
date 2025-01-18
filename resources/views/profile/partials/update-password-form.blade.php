<section class="bg-gradient-to-r from-green-100 to-green-50 p-8 rounded-xl shadow-md border border-green-300">
    <header>
        <h2 class="text-xl font-bold text-green-700">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-green-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full bg-green-50 border border-green-300 rounded-md focus:ring focus:ring-green-500 focus:border-green-500" autocomplete="current-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full bg-green-50 border border-green-300 rounded-md focus:ring focus:ring-green-500 focus:border-green-500" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-green-50 border border-green-300 rounded-md focus:ring focus:ring-green-500 focus:border-green-500" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</section>
