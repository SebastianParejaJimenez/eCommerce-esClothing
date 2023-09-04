@extends('layouts.appstore')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <div class="mx-auto max-w-2xl px-2 py-12 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

            <x-productos.contexto-empresa :productos='$producto_randoms' />


            <!-- Componente categoria y prods -->
            <div class="container mx-auto px-6">

                <div class="h-64 rounded-md overflow-hidden bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Categorias</h2>
                            <p class="mt-2 text-gray-400">Si quieres conocer sobre nuestros productos por favor dirigete
                                hacia el catalogo</p>
                            <form action="{{ route('catalogo') }}">
                                <button href="#"
                                    class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <span>Catalogo</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <x-productos.top-productos :productos='$producto_randoms' />

            <section class="flex items-center  font-poppins dark:bg-gray-800 ">
                <div class="justify-center flex-1 mx-auto max-w-7xl ">
                    <div class="relative px-4 py-4 mx-4 bg-white bg-bottom bg-no-repeat bg-cover rounded-md shadow md:p-10 dark:bg-gray-900"
                        style="min-height: 380px; background-image: url('https://i.postimg.cc/MG2RXhTt/bg.png')">
                        <div class="absolute top-0 bottom-0 left-0 right-0 flex items-center ">
                            <div class="max-w-3xl px-4 mx-auto text-center">
                                <a class="inline-block mb-2 text-blue-500 dark:text-blue-400" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="w-10 h-10 bi bi-envelope-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                        <path
                                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </a>
                                <h2 class="mb-6 text-2xl font-bold tracking-wide text-gray-700 dark:text-gray-300 md:text-5xl">
                                    Subscribirse
                                </h2>
                                <p class="mb-6 text-base font-medium text-gray-500 dark:text-gray-400 md:text-lg">
                                    ¡Si deseas tener conocimientos sobre las novedades puedes subscribirte con tu correo para recibir informacion de nuestros productos!
                                </p>
                                <div class="flex flex-wrap justify-center ">
                                    <input
                                        class="w-full px-4 py-4 mb-4 text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded dark:border-gray-700 lg:mr-3 dark:placeholder-gray-400 dark:text-gray-300 dark:bg-gray-800 md:mb-0 md:w-1/2"
                                        type="email" placeholder="Ingresa tu Correo">
                                    <button
                                        class="w-full px-6 py-4 text-sm font-semibold text-gray-100 bg-green-500 rounded md:w-auto md:ml-2 dark:bg-green-400 dark:hover:bg-green-500 hover:bg-green-600">
                                        Subscribirse</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <x-footers.footer-store />

    </div>
@endsection
