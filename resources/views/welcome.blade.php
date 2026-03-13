<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Progress Tracker</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- Navbar -->
    <header class="w-full border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div>
                <a href="/" class="text-2xl font-bold tracking-tight text-slate-900">
                    Personal Progress Tracker
                </a>
            </div>

            <nav class="hidden items-center gap-8 md:flex">
                <a href="#funcionalidades" class="text-sm font-medium text-slate-600 transition hover:text-blue-600">
                    Funcionalidades
                </a>
                <a href="#beneficios" class="text-sm font-medium text-slate-600 transition hover:text-blue-600">
                    Beneficios
                </a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                        Ir al dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                        Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero -->
    <main>
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-emerald-50"></div>

            <div class="relative mx-auto grid max-w-7xl gap-12 px-6 py-20 md:grid-cols-2 md:items-center md:py-28">
                <div>
                    <span class="inline-flex rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-blue-700">
                        TFG · Ingeniería Informática
                    </span>

                    <h1 class="mt-6 text-4xl font-extrabold leading-tight tracking-tight text-slate-900 md:text-6xl">
                        Controla tus hábitos, actividad física y lecturas en un solo lugar
                    </h1>

                    <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">
                        Personal Progress Tracker es una plataforma web para registrar, organizar
                        y visualizar tu progreso personal de forma sencilla, clara y centralizada.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="rounded-xl bg-blue-600 px-6 py-3 text-base font-semibold text-white shadow-md transition hover:bg-blue-700">
                                Acceder al dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="rounded-xl bg-blue-600 px-6 py-3 text-base font-semibold text-white shadow-md transition hover:bg-blue-700">
                                Empezar ahora
                            </a>

                            <a href="{{ route('login') }}"
                               class="rounded-xl border border-slate-300 bg-white px-6 py-3 text-base font-semibold text-slate-700 transition hover:bg-slate-100">
                                Iniciar sesión
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Tarjeta visual -->
                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl bg-blue-50 p-5">
                            <div class="text-sm font-semibold text-blue-700">Hábitos</div>
                            <p class="mt-2 text-sm text-slate-600">
                                Registra tus rutinas diarias y mantén constancia.
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 p-5">
                            <div class="text-sm font-semibold text-emerald-700">Actividad física</div>
                            <p class="mt-2 text-sm text-slate-600">
                                Guarda entrenamientos y consulta tu evolución.
                            </p>
                        </div>

                        <div class="rounded-2xl bg-amber-50 p-5">
                            <div class="text-sm font-semibold text-amber-700">Lecturas</div>
                            <p class="mt-2 text-sm text-slate-600">
                                Organiza libros pendientes, en curso y completados.
                            </p>
                        </div>

                        <div class="rounded-2xl bg-slate-100 p-5">
                            <div class="text-sm font-semibold text-slate-700">Dashboard</div>
                            <p class="mt-2 text-sm text-slate-600">
                                Visualiza estadísticas y progreso de forma clara.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <p class="text-sm font-medium text-slate-700">
                            Una plataforma unificada para seguir tu progreso personal
                        </p>
                        <p class="mt-2 text-sm text-slate-500">
                            Pensada para centralizar hábitos, fitness y lecturas en una sola aplicación.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Funcionalidades -->
        <section id="funcionalidades" class="mx-auto max-w-7xl px-6 py-20">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                    Funcionalidades principales
                </h2>
                <p class="mt-4 text-lg text-slate-600">
                    Todo lo necesario para registrar y consultar tu progreso personal.
                </p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <h3 class="text-lg font-semibold text-slate-900">Gestión de hábitos</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Crea, edita y organiza hábitos personales para dar seguimiento a tus rutinas.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <h3 class="text-lg font-semibold text-slate-900">Seguimiento físico</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Registra actividades físicas y consulta información sobre tu esfuerzo y constancia.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <h3 class="text-lg font-semibold text-slate-900">Control de lecturas</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Lleva un control de libros pendientes, en progreso o finalizados.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <h3 class="text-lg font-semibold text-slate-900">Visualización de datos</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Consulta métricas y estadísticas para interpretar tu evolución con facilidad.
                    </p>
                </div>
            </div>
        </section>

        <!-- Beneficios -->
        <section id="beneficios" class="bg-white py-20">
            <div class="mx-auto grid max-w-7xl gap-12 px-6 md:grid-cols-2 md:items-center">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                        Una aplicación clara, útil y pensada para el día a día
                    </h2>
                    <p class="mt-4 text-lg text-slate-600">
                        El objetivo es ayudarte a centralizar tu información personal y ofrecer una
                        experiencia sencilla, intuitiva y accesible desde cualquier navegador.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <h3 class="font-semibold text-slate-900">Todo centralizado</h3>
                        <p class="mt-2 text-sm text-slate-600">
                            Hábitos, actividad física y lecturas en una única plataforma.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-slate-50 p-5">
                        <h3 class="font-semibold text-slate-900">Fácil de usar</h3>
                        <p class="mt-2 text-sm text-slate-600">
                            Interfaz simple y ordenada, pensada para una navegación intuitiva.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-slate-50 p-5">
                        <h3 class="font-semibold text-slate-900">Accesible en web</h3>
                        <p class="mt-2 text-sm text-slate-600">
                            Disponible desde navegador sin necesidad de instalar software adicional.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-slate-50 p-5">
                        <h3 class="font-semibold text-slate-900">Escalable</h3>
                        <p class="mt-2 text-sm text-slate-600">
                            Preparada para crecer con nuevas funcionalidades y visualizaciones.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 bg-slate-50">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-8 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">
            <p>© {{ date('Y') }} Personal Progress Tracker</p>
            <p>TFG · Grado en Ingeniería Informática</p>
        </div>
    </footer>

</body>
</html>
