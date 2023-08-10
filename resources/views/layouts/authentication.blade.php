<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-inter antialiased bg-slate-100  text-slate-600 ">

        <main class="bg-white">

            <div class="relative flex">

                <!-- Content -->
                <div class="w-full md:w-full">
                    <div class="min-h-screen h-full flex flex-col after:flex-1">
                        <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
                            {{ $slot }}
                        </div>

                    </div>

                </div>

            </div>

        </main>
    </body>
</html>
