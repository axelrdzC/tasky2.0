<x-app-layout>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">

        <!-- this is EL TEXTO A LEER X AUTOMATICO -->
        <div id="textToRead" hidden>
            Usted se encuentra en la página de su perfil, aquí podrá administrar todo lo relacionado con su cuenta 
        </div>

        <!-- this is LOS MODULOS EDITABLES -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
           
            @include('profile.partials.update-profile-information-form')

            @include('profile.partials.update-password-form')
            
            @include('profile.partials.delete-user-form')
            
        </div>
    </div>
</x-app-layout>
