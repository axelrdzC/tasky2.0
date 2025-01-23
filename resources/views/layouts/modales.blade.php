<x-app-layout>

    <!-- this is EL MODAL SEGUN -->
    <div class="flex items-center justify-center bg-gray-100">

        <div class="max-w-lg w-full mt-10 bg-white rounded-lg shadow-xl p-6 relative">
            @yield('contenido')
        </div>

    </div>

    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.onload = function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonText: 'Entendido'
                });
            };
        </script>
    @endif

    <script>
        const range = document.getElementById('range');
        const valorRange = document.getElementById('valor');

        valorRange.textContent = range.value;

        range.addEventListener('input', () => {
            valorRange.textContent = range.value;
        });
    </script>

</x-app-layout>
