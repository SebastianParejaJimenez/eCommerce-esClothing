<x-app-guest background="bg-white">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="max-w-2xl m-auto mt-16">

            <div class="text-center px-4">
                <div class="inline-flex mb-8">
                    <img src="{{ asset('images/404-illustration.svg') }}" width="176" height="176" alt="404 illustration" />
                </div>
                <div class="mb-6">Parece que algo salio mal... La pagina en la que actualmente estas no existe </div>
                <a href="{{ route('home') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">¡Vuelve a la tienda!</a>
            </div>

        </div>

    </div>
</x-app-guest>
