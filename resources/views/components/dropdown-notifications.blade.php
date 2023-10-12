@props([
    'align' => 'right',
])

<div class="relative inline-flex " x-data="{ open: false }">
    <button
        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
        :class="{ 'bg-slate-200': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
        <span class="sr-only">Notifications</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
        @if (auth()->user()->unreadNotifications->count() > 0)
            <span class="absolute -top-2 left-4 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif

    </button>
    <div class="origin-top-right max-h-60 overflow-scroll z-10 absolute top-full -mr-48 sm:mr-0 min-w-80 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{ $align === 'right' ? 'right-0' : 'left-0' }}"
        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak>
        <div class="text-xs sticky top-0 font-semibold text-slate-400 dark:text-slate-500 uppercase pt-1.5 pb-2 px-4 bg-white">Tienes
            {{ auth()->user()->unreadNotifications->count() }} Notificaciones Nuevas</div>
        <ul>
            @if (auth()->user()->unreadNotifications->count() > 0)
                <a href="{{ route('marcar.notificaciones') }}"
                    class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20" href="#0"
                    @click="open = false" @focus="open = true" @focusout="open = false">
                    <span class="font-medium text-blue-800 dark:text-slate-100 ">Marcar como leído</span>
                </a>

                @foreach (auth()->user()->unreadNotifications as $notification)
                    <li class="border-b border-slate-200 dark:border-slate-700 last:border-0">
                        <a class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20"
                            href="{{ route('marcar.notificacion', [$notification->id, $notification->data['id']]) }}"
                            @click="open = false" @focus="open = true" @focusout="open = false">
                            <span class="block text-sm mb-2">📣 <span
                                    class="font-medium text-slate-800 dark:text-slate-100">Nuevo Pedido</span>
                                <span class="block text-sm mb-2"><span
                                        class="font-medium text-slate-800 dark:text-slate-100">El usuario:</span>
                                    {{ $notification->data['name'] }}, Ha realizado un pedido por:
                                    {{ $notification->data['subtotal'] }}$</span>
                                <span class="block text-xs font-medium text-slate-400 dark:text-slate-500">Fecha:
                                    {{ \Carbon\Carbon::parse($notification->data['orden_date'])->formatLocalized('%d %B %Y %I:%M %p') }}</span>
                        </a>
                    </li>
                @endforeach
               
                @foreach (auth()->user()->unreadNotifications as $notification)
                    <li class="border-b border-slate-200 dark:border-slate-700 last:border-0">
                        <a class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20"
                            href="{{ route('marcar.notificacion', [$notification->id, $notification->data['id']]) }}"
                            @click="open = false" @focus="open = true" @focusout="open = false">
                            <span class="block text-sm mb-2">📣 <span
                                    class="font-medium text-slate-800 dark:text-slate-100">Nuevo Pedido</span>
                                <span class="block text-sm mb-2"><span
                                        class="font-medium text-slate-800 dark:text-slate-100">El usuario:</span>
                                    {{ $notification->data['name'] }}, Ha realizado un pedido por:
                                    {{ $notification->data['subtotal'] }}$</span>
                                <span class="block text-xs font-medium text-slate-400 dark:text-slate-500">Fecha:
                                    {{ \Carbon\Carbon::parse($notification->data['orden_date'])->formatLocalized('%d %B %Y %I:%M %p') }}</span>
                        </a>
                    </li>
                @endforeach
                 
            @endif

        </ul>
    </div>
</div>
