<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Personal Progress Tracker') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-emerald-50">
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-6 py-8">
            <!-- Cabecera -->
            <header class="flex items-center justify-between">
                <a href="/" class="text-2xl font-bold tracking-tight text-slate-900">
                    Personal Progress Tracker
                </a>

                <a href="/"
                   class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                    Volver al inicio
                </a>
            </header>

            <!-- Contenido -->
            <div class="flex flex-1 items-center justify-center py-10">
                <div class="grid w-full max-w-6xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl lg:grid-cols-2">
                    <!-- Panel izquierdo -->
                    <div class="hidden bg-slate-900 px-10 py-12 text-white lg:flex lg:flex-col lg:justify-between">
                        <div>
                            <div class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-semibold text-blue-200">
                                Personal Progress Tracker
                            </div>

                            <h1 class="mt-6 text-4xl font-extrabold leading-tight">
                                Gestiona tu progreso personal de forma clara y sencilla
                            </h1>

                            <p class="mt-6 max-w-md text-base leading-7 text-slate-300">
                                Accede a tu cuenta para registrar hábitos, actividad física y lecturas
                                desde una única plataforma web.
                            </p>
                        </div>

                        <div class="grid gap-4">
                            <div class="rounded-2xl bg-white/5 p-4">
                                <h3 class="font-semibold text-white">Hábitos</h3>
                                <p class="mt-1 text-sm text-slate-300">
                                    Da seguimiento a tus rutinas y objetivos diarios.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-white/5 p-4">
                                <h3 class="font-semibold text-white">Actividad física</h3>
                                <p class="mt-1 text-sm text-slate-300">
                                    Registra entrenamientos y consulta tu evolución.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-white/5 p-4">
                                <h3 class="font-semibold text-white">Lecturas</h3>
                                <p class="mt-1 text-sm text-slate-300">
                                    Organiza tus libros pendientes, en curso y finalizados.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Panel derecho -->
                    <div class="flex items-center justify-center px-6 py-10 sm:px-10 lg:px-12">
                        <div class="w-full max-w-md">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
