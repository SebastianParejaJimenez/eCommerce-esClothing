<div id="spinner-loading" class='flex items-center justify-center min-h-screen'>

    <div class="flex space-x-2 animate-pulse">
        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
    </div>
</div>
<script>

let contentTable = document.getElementById('content-table')

function showSpinner() {
  // Mostrar el spinner

  // Insertar la clase invisible en el contenido de la tabla
  contentTable.classList.add("invisible");
}

function hideSpinner() {
  // Ocultar el spinner
  document.getElementById('spinner-loading').style.display = 'none';

  // Eliminar la clase invisible del contenido de la tabla
  contentTable.classList.remove("invisible");
}

hideSpinner();

</script>
