<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                    Panel principal
                </p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                    Dashboard de progreso
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Consulta de un vistazo tu actividad reciente y el estado general de tu progreso personal.
                </p>
            </div>

            <div class="text-sm text-slate-500">
                {{ now()->translatedFormat('d \d\e F \d\e Y') }}
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

            <!-- Tarjetas resumen -->
            <section class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-500">Hábitos activos</p>
                    <p class="mt-4 text-4xl font-bold tracking-tight text-slate-900">
                        {{ $habitosHoy ?? 0 }}
                    </p>
                    <p class="mt-2 text-sm text-slate-600">
                        hábitos programados para hoy
                    </p>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-500">Completados hoy</p>
                    <p class="mt-4 text-4xl font-bold tracking-tight text-blue-600">
                        {{ $habitosCompletadosHoy ?? 0 }}
                    </p>
                    <p class="mt-2 text-sm text-slate-600">
                        hábitos marcados como realizados
                    </p>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-500">Actividad esta semana</p>
                    <p class="mt-4 text-4xl font-bold tracking-tight text-emerald-600">
                        {{ $minutosSemana ?? 0 }}
                    </p>
                    <p class="mt-2 text-sm text-slate-600">
                        minutos acumulados
                    </p>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-500">Lecturas este mes</p>
                    <p class="mt-4 text-4xl font-bold tracking-tight text-amber-600">
                        {{ $lecturasMes ?? 0 }}
                    </p>
                    <p class="mt-2 text-sm text-slate-600">
                        libros registrados este mes
                    </p>
                </div>
            </section>

            <!-- Bloques inferiores -->
            <section class="grid gap-6 xl:grid-cols-3">
                <!-- Resumen general -->
                <div class="xl:col-span-2 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Resumen general</h2>
                            <p class="mt-1 text-sm text-slate-600">
                                Estado actual de tus módulos principales.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-sm font-medium text-slate-500">Hábitos</p>
                            <p class="mt-3 text-2xl font-bold text-slate-900">
                                {{ $habitosHoy ?? 0 }}/{{ $totalHabitos ?? 0 }}
                            </p>
                            <p class="mt-2 text-sm text-slate-600">
                                seguimiento diario
                            </p>
                        </div>

                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-sm font-medium text-slate-500">Sesiones deportivas</p>
                            <p class="mt-3 text-2xl font-bold text-slate-900">
                                {{ $sesionesSemana ?? 0 }}
                            </p>
                            <p class="mt-2 text-sm text-slate-600">
                                registradas esta semana
                            </p>
                        </div>

                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-sm font-medium text-slate-500">Leyendo ahora</p>
                            <p class="mt-3 text-2xl font-bold text-slate-900">
                                {{ $lecturasActuales ?? 0 }}
                            </p>
                            <p class="mt-2 text-sm text-slate-600">
                                lecturas en progreso
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 rounded-2xl border border-blue-100 bg-blue-50 p-5">
                        <p class="text-sm font-semibold text-blue-700">
                            Consejo
                        </p>
                        <p class="mt-2 text-sm leading-6 text-slate-700">
                            Mantener constancia en los hábitos y registrar actividad de forma periódica te permitirá
                            obtener métricas más útiles y una visión más clara de tu evolución.
                        </p>
                    </div>
                </div>

                <!-- Acciones rápidas -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">Acciones rápidas</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Accede rápidamente a las funciones principales.
                    </p>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('habitos.index') }}"
                           class="flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-4 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                            <span>Gestionar hábitos</span>
                            <span>→</span>
                        </a>

                        <a href="{{ route('actividades.index') }}"
                           class="flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-4 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                            <span>Registrar actividad física</span>
                            <span>→</span>
                        </a>

                        <a href="{{ route('lecturas.index') }}"
                           class="flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-4 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                            <span>Consultar lecturas</span>
                            <span>→</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-4 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                            <span>Editar perfil</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
