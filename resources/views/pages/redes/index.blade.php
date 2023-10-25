<x-app-layout>
    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>


    <section class="px-4 sm:px-6 lg:px-8 py-4 w-full max-w-9xl mx-auto">
        <div class="bg-white p-7 rounded-lg">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Redes Sociales</h1>
                        <p class="mt-2 text-sm text-gray-700">A continuacion podras ver y editar los links de tus redes
                            sociales que estan disponibles para tus clientes.</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                                                Link Facebook</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                                                Link Whatsapp</th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Link Instagram</th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Link Twitter / X</th>
                                            <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $redes->link_facebook }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $redes->link_whatsapp }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $redes->link_instagram }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $redes->link_twitter }}</td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a onclick="openModal({{ json_encode($redes) }})"
                                                    class="cursor-pointer text-indigo-600 hover:text-indigo-900">Editar
                                                    Links</a>
                                            </td>
                                        </tr>

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7);">
        <div
            class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Links de Redes Sociales</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">
                    <div class="my-5">
                        <form action="{{route('redes_sociales.update')}}" class="formulario-validacion" method="POST" enctype="multipart/form-data"
                            id="form-edit">
                            @csrf
                            <div class="grid gap-4 gap-y-3 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <p class="flex items-center gap-x-2">
                                        <span class=" items-baseline">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                            </svg>
                                        </span>
                                        Link Facebook
                                    </p>
                                    <input id="red_facebook" type="text" name="link_facebook"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 outline-none"
                                        autocomplete="off" />

                                    <p class="error hidden text-red-500 text-sm italic mt-2" id="error_link_facebook">
                                        Error link Facebook</p>

                                </div>
                                <div class="md:col-span-5">
                                    <p class="flex items-center gap-x-2">
                                        <span class=" items-baseline">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                            </svg>
                                        </span>
                                        Link Whatsapp
                                    </p>
                                    <input id="red_whatsapp" type="text" name="link_whatsapp"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 outline-none"
                                        autocomplete="off" />
                                    <p class="error hidden text-red-500 text-sm italic mt-2" id="error_link_whatsapp">
                                        Error Link Whatsapp</p>

                                </div>
                                <div class="md:col-span-5">
                                    <p class="flex items-center gap-x-2">
                                        <span class=" items-baseline">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                            </svg>
                                        </span>
                                        Link Instagram
                                    </p>
                                    <input type="text" name="link_instagram" id="red_instagram"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 outline-none"
                                        autocomplete="off" />
                                    <p class="error hidden text-red-500 text-sm italic mt-2" id="error_link_instagram">
                                        Error Link Instagram</p>
                                </div>
                                <div class="md:col-span-5">
                                    <p class="flex items-center gap-x-2">
                                        <span class=" items-baseline">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500" height="1em"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                            </svg>
                                        </span>
                                        Link Twitter / X
                                    </p>
                                    <input type="text" name="link_twitter" id="red_twitter"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 outline-none"
                                        autocomplete="off" />
                                    <p class="error hidden text-red-500 text-sm italic mt-2" id="error_link_twitter">
                                        Error Link Twitter</p>
                                </div>
                                <div class="md:col-span-5 text-right pt-2">
                                    <div class="inline-flex items-end">
                                        <p
                                            class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded transition-colors duration-300 modal-cancel-edit cursor-pointer">
                                            Cancelar
                                        </p>
                                    </div>
                                    <div class="inline-flex items-end">
                                        <button type="submit" onClick="validateFm();"
                                            class="bg-melrose-500 hover:bg-melrose-400 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                                            Confirmar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-slot:js>


        <script>
            const modal = document.querySelector('.main-modal');
            const closeButton = document.querySelectorAll('.modal-close');

            function validateFm() {
                $(".formulario-validacion").validate({
                    rules: {
                        // simple rule, converted to {required:true}
                        link_facebook: {
                            required: true,
                            url: true
                        },
                        link_whatsapp: {
                            required: true,
                            url: true
                        },
                        link_instagram: {
                            required: true,
                            url: true
                        },
                        link_twitter: {
                            required: true,
                            url: true
                        },
                    },
                    messages: {
                        link_facebook: {
                            required: "El campo es Requerido y no puede estar Vacio.",
                            url: "El campo debe ser un a URL valida.",
                        },
                        link_whatsapp: {
                            required: "El campo es Requerido y no puede estar Vacio.",
                            url: "El campo debe ser un a URL valida.",
                        },
                        link_instagram: {
                            required: "El campo es Requerido y no puede estar Vacio.",
                            url: "El campo debe ser un a URL valida.",
                        },
                        link_twitter: {
                            required: "El campo es Requerido y no puede estar Vacio.",
                            url: "El campo debe ser un a URL valida.",
                        }
                    }
                });

            }

            const modalClose = () => {
                modal.classList.remove('fadeIn');
                modal.classList.add('fadeOut');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 500);
            }

            const openModal = (redes_sociales) => {
                modal.classList.remove('fadeOut');
                modal.classList.add('fadeIn');
                modal.style.display = 'flex';

                modal.classList.remove('fadeOut');
                modal.classList.add('fadeIn');
                modal.style.display = 'flex';

                const inputRedSocialFacebook = document.getElementById('red_facebook');
                red_facebook.value = redes_sociales.link_facebook

                const inputRedSocialWhatsapp = document.getElementById('red_whatsapp');
                red_whatsapp.value = redes_sociales.link_whatsapp


                const inputRedSocialInstagram = document.getElementById('red_instagram');
                red_instagram.value = redes_sociales.link_instagram


                const inputRedSocialTwitter = document.getElementById('red_twitter');
                red_twitter.value = redes_sociales.link_twitter

            }

            for (let i = 0; i < closeButton.length; i++) {

                const elements = closeButton[i];

                elements.onclick = (e) => modalClose();

                modal.style.display = 'none';

            }
        </script>


    </x-slot:js>
</x-app-layout>
