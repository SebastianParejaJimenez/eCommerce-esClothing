@if ($errors->any())
    <x-dashboard.alert.alert />
@endif


<div class="container max-w-screen-xl">
    <div>
        <div class="rounded md:p-1  bg-white dark:bg-gray-800 ">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="lg:col-span-4" x-data="{ selectedCategory: '' }">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('productos.store') }}"
                        class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols formulario-validacion">
                        @csrf

                        <div class="md:col-span-5 dark:text-white mb-3">
                            <label for="full_name">Nombre del Producto</label>
                            <input type="text" id="nombre" name="nombre"
                                placeholder="Ingrese el Nombre que tendra este Producto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="md:col-span-5 dark:text-white mb-3">
                            <label for="email">Precio</label>
                            <input type="number" id="price" name="precio" min="1"
                                placeholder="Ingrese el Precio que tendra este Producto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </div>

                        <div class="md:col-span-3 dark:text-white mb-3">
                            <label for="address">Cantidades Disponibles</label>
                            <input type="number" id="cantidad" name="cantidad" min="1"
                                placeholder="Ingrese las Cantidades que tenga del Producto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="md:col-span-2 dark:text-white mb-3">
                            <label
                                for="text"class="block text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                            <select x-model="selectedCategory" type="text" id="categorias" name="categoria"
                                placeholder="Ingrese La categoria que tendra este Producto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected disabled>Seleccione una Opcion</option>
                                <option value="Camisas">Camisas</option>
                                <option value="Accesorios">Accesorios</option>
                                <option value="Chaquetas-Buzos">Chaquetas y Buzos</option>
                                <option value="Pantalones">Pantalones</option>
                                <option value="Vestidos">Vestidos</option>
                                <option value="Conjuntos">Conjuntos</option>
                                <option value="Shorts">Shorts</option>
                            </select>
                        </div>
                        <div class="md:col-span-5 dark:text-white mb-3">
                            <label
                                for="image"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir
                                Imagen
                                del Producto</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="imagen" accept="image/png, image/jpeg, image/jpg" >
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> PNG,
                                JPG o JPEG (MAXIMO. 10 MB).</p>

                        </div>

                        <div class="md:col-span-5 mb-3" x-show="selectedCategory !== 'Accesorios'">
                            <label
                                for="image"class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tallas
                                Disponibles</label>

                            <div class='flex gap-6'>
                                @foreach ($tallas as $talla)
                                    <div class='flex flex-row'>
                                        <input type="checkbox" name="tallas[]" id="{{ $talla->talla }}"
                                            value="{{ $talla->id }}"
                                            class='
                                            appearance-none h-6 w-6 bg-gray-400 rounded-full
                                            checked:bg-green-300 checked:scale-75
                                            transition-all duration-200 peer' />
                                        <div
                                            class='h-6 w-6 absolute rounded-full pointer-events-none
                                        peer-checked:border-green-300 peer-checked:border-2'>
                                        </div>
                                        <label for='{{ $talla->talla }}'
                                            class='flex flex-col justify-center px-2 peer-checked:text-green-400  select-none'>{{ $talla->talla }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                </div>


            </div>


            <div class="md:col-span-4 text-right my-4">
                <div class="inline-flex items-end">
                    <button type="button" class="modal-cancel bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-3">Cancelar</button>
                    <button type="submit" onClick="validateFm()"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mx-3">Guardar</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>


<script>
    function validateFm() {
        const inputCategorias = document.getElementById('categorias');
        let categoria = inputCategorias.value;

        jQuery.validator.addMethod("fileExtension", function(value, element, param) {
            param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
            return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
        }, "Por favor, selecciona un archivo con una extensión válida.");

        $.validator.addMethod('positiveNumber',
        function (value) {
            return Number(value) > 0;
        }, 'Enter a positive number.');

        $.validator.addMethod('filesize', function (value, element, param) {
            console.log(element.files[0].size)
            return this.optional(element) || (element.files[0].size <= param * 1000000)
        }, 'La imagen debe pesar menos de: {0} MB');


        $(".formulario-validacion").validate({
            rules: {
                nombre: {
                    required: true,
                },
                precio: {
                    required: true,
                    positiveNumber: true,
                },
                cantidad: {
                    required: true,
                    positiveNumber: true,
                },
                categoria: {
                    required: true,
                },
                imagen: {
                    required: true,
                    fileExtension: "jpg|jpeg|png",
                    filesize: 10,
                },
                'tallas[]': {
                    required: true,
                }
            },
            messages: {
                nombre: {
                    required: "El campo es requerido y no puede estar vacío.",
                },
                categoria: {
                    required: "El campo es requerido y no puede estar vacío.",
                },
                precio: {
                    required: "El campo es requerido y no puede estar vacío.",
                    positiveNumber: "El campo debe ser un numero mayor a 1",
                    min: "El campo debe ser mayor a 1",
                    number: "El campo debe ser un numero",

                },
                cantidad: {
                    required: "El campo es requerido y no puede estar vacío.",
                    positiveNumber: "El campo debe ser un numero mayor a 1",
                    min: "El campo debe ser mayor a 1",
                    number: "El campo debe ser un numero",
                },
                'tallas[]': {
                    required: "El campo es requerido y no puede estar vacío.",
                },
                imagen: {
                    required: "Por favor, selecciona una imagen.",
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") == "checkbox") {
                    error.insertBefore(element);
                } else {
                    error.insertAfter(element);
                }
            },

            errorClass: "error text-red-500 text-sm italic pr-4",
        });
    }


    const modal = document.querySelector('.main-modal');
    const closeButton = document.querySelectorAll('.modal-close');
    const cancelButton = document.querySelectorAll('.modal-cancel');

    const modalClose = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }

    const modalCancel = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }


    const openModal = () => {
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }

    for (let i = 0; i < closeButton.length; i++) {

        const elements = closeButton[i];

        elements.onclick = (e) => modalClose();

        modal.style.display = 'none';

        window.onclick = function(event) {
            if (event.target == modal) modalClose();
        }
    }


    for (let i = 0; i < cancelButton.length; i++) {

        const elements = cancelButton[i];

        elements.onclick = (e) => modalCancel();

        modal.style.display = 'none';

        window.onclick = function(event) {
            if (event.target == modal) modalCancel();
        }
    }
</script>
