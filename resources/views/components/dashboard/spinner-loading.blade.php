<div id="spinner-loading" class='flex items-center justify-center min-h-screen'>

    <div class="flex space-x-2 animate-pulse">
        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
    </div>
</div>
<script>
    window.onload = function () {
        // Ocultar el spinner
        document.getElementById('spinner-loading').style.display = 'none';
        // Mostrar la tabla
        document.getElementById('content-table').style.display = 'block';
    };
</script>
