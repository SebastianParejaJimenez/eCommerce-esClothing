<div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
    <a href="{{ route('catalogo')}}" class="block font-medium  hover:underline text-gray-500 dark:text-gray-300 @if(request()->url() == url('/catalogo'))
        {{ 'underline decoration-2 decoration-blue-600 ' }}
    @endif ">Todos</a>
    <a href="{{ route('catalogo_categoria', ['categoria' => 'Chaquetas-Buzos']) }}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline @if(Request::segment(2) === 'Chaquetas-Buzos')
        {{ 'underline decoration-2 decoration-blue-600 ' }}
    @endif">Chaquetas & Buzos</a>
    <a href="{{ route('catalogo_categoria', ['categoria' => 'Camisas']) }}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline @if(Request::segment(2) === 'Camisas')
    {{ 'underline decoration-2 decoration-blue-600 ' }}
@endif">Camisetas</a>
    <a href="{{ route('catalogo_categoria', ['categoria' => 'Vestidos']) }}" class="block font-medium text-gray-500 dark:text-gray-300  hover:underline @if(Request::segment(2) === 'Vestidos')
    {{ 'underline decoration-2 decoration-blue-600 ' }}
@endif ">Vestidos</a>
    <a href="{{ route('catalogo_categoria', ['categoria' => 'Shorts']) }}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline @if(Request::segment(2) === 'Shorts')
    {{ 'underline decoration-2 decoration-blue-600 ' }}
@endif">Shorts</a>
    <a href="{{ route('catalogo_categoria', ['categoria' => 'Pantalones']) }}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline @if(Request::segment(2) === 'Pantalones')
    {{ 'underline decoration-2 decoration-blue-600 ' }}
@endif ">Pantalones</a>
    <a href="{{ route('catalogo_categoria', ['categoria' => 'Conjuntos']) }}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline @if(Request::segment(2) === 'Conjuntos')
    {{ 'underline decoration-2 decoration-blue-600 ' }}
@endif ">Conjuntos</a>
</div>
