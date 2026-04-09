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
        <div class="mx-auto max-w-7xl space-y-10 px-4 sm:px-6 lg:px-8">

            <!-- Tarjetas resumen -->
            <section class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-500">Hábitos activos</p>
                    <p class="mt-4 text-4xl font-bold tracking-tight text-blue-600">
                        {{ $habitosActivos ?? 0 }}
                    </p>
                    <p class="mt-2 text-sm text-slate-600">
                        hábitos registrados actualmente
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
                    <p class="mt-4 text-4xl font-bold tracking-tight text-orange-500">
                        {{ $lecturasMes ?? 0 }}
                    </p>
                    <p class="mt-2 text-sm text-slate-600">
                        libros registrados este mes
                    </p>
                </div>
            </section>

            <!-- Resumen + Acciones -->
            <section class="grid gap-6 xl:grid-cols-3">
                <div class="xl:col-span-2 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">Resumen general</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Estado actual de tus módulos principales.
                    </p>

                    <div class="mt-6 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-sm font-medium text-slate-500">% cumplimiento hoy</p>
                            <p class="mt-3 text-2xl font-bold text-blue-600">
                                {{ $habitosActivos > 0 ? round(($habitosCompletadosHoy / $habitosActivos) * 100) : 0 }}%
                            </p>
                            <p class="mt-2 text-sm text-slate-600">
                                hábitos completados sobre activos
                            </p>
                        </div>

                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-sm font-medium text-slate-500">Media minutos/día</p>
                            <p class="mt-3 text-2xl font-bold text-emerald-600">
                                {{ round(($minutosSemana ?? 0) / 7, 1) }}
                            </p>
                            <p class="mt-2 text-sm text-slate-600">
                                promedio diario esta semana
                            </p>
                        </div>

                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-sm font-medium text-slate-500">Leyendo ahora</p>
                            <p class="mt-3 text-2xl font-bold text-orange-500">
                                {{ $lecturasLeyendo ?? 0 }}
                            </p>
                            <p class="mt-2 text-sm text-slate-600">
                                lecturas en progreso
                            </p>
                        </div>
                    </div>
                </div>

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

            <!-- Gráficas -->
            <section class="grid gap-6 xl:grid-cols-3">

                <!-- Hábitos -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900">📘 Hábitos</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Últimos 7 días
                    </p>

                    <div class="mt-4 h-56">
                        <canvas id="graficaHabitos"></canvas>
                    </div>
                </div>

                <!-- Actividad -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900">🏃 Actividad</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Minutos últimos 7 días
                    </p>

                    <div class="mt-4 h-56">
                        <canvas id="graficaActividad"></canvas>
                    </div>
                </div>

                <!-- Lecturas -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900">📚 Lecturas</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Estado actual
                    </p>

                    <div class="mt-4 h-56">
                        <canvas id="graficaLecturas"></canvas>
                    </div>
                </div>

            </section>


            <section class="grid gap-6 xl:grid-cols-3">
                <!-- Últimos hábitos completados -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">✅ Últimos hábitos completados</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Registros recientes de cumplimiento.
                    </p>

                    <div class="mt-6 space-y-4">
                        @forelse($ultimosHabitosCompletados as $registro)
                            <div class="rounded-2xl bg-slate-50 p-4 transition hover:bg-slate-100">
                                <p class="font-semibold text-slate-900">
                                    {{ $registro->habito->nombre ?? 'Hábito' }}
                                </p>
                                <p class="mt-1 text-sm text-slate-600">
                                    {{ \Carbon\Carbon::parse($registro->fecha)->format('d/m/Y') }}
                                </p>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500">
                                Todavía no hay hábitos completados.
                            </p>
                        @endforelse
                    </div>
                </div>

                <!-- Últimas actividades -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">🏃 Últimas actividades</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Sesiones deportivas registradas recientemente.
                    </p>

                    <div class="mt-6 space-y-4">
                        @forelse($ultimasActividades as $actividad)
                            <div class="rounded-2xl bg-slate-50 p-4 transition hover:bg-slate-100">
                                <p class="font-semibold text-slate-900">
                                    {{ ucfirst($actividad->tipo) }}
                                </p>
                                <p class="mt-1 text-sm text-slate-600">
                                    {{ $actividad->duracion }} min · {{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}
                                </p>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500">
                                Todavía no hay actividades registradas.
                            </p>
                        @endforelse
                    </div>
                </div>

                <!-- Últimas lecturas -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">📚 Últimas lecturas añadidas</h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Libros añadidos recientemente a tu seguimiento.
                    </p>

                    <div class="mt-6 space-y-4">
                        @forelse($ultimasLecturas as $lectura)
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <p class="font-semibold text-slate-900">
                                    {{ $lectura->titulo }}
                                </p>
                                <p class="mt-1 text-sm text-slate-600">
                                    {{ $lectura->autor ?: 'Autor no indicado' }}
                                </p>
                                <p class="mt-1 text-xs font-medium text-slate-500">
                                    Estado: {{ ucfirst($lectura->estado) }}
                                </p>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500">
                                Todavía no hay lecturas registradas.
                            </p>
                        @endforelse
                    </div>
                </div>
            </section>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labelsHabitos = @json($labelsHabitos);
        const datosHabitos = @json($datosHabitos);

        const labelsActividad = @json($labelsActividad);
        const datosActividad = @json($datosActividad);

        const datosLecturas = [
            {{ $lecturasPendientes ?? 0 }},
            {{ $lecturasLeyendo ?? 0 }},
            {{ $lecturasLeidas ?? 0 }}
        ];

        // Grafica de hábitos
        new Chart(document.getElementById('graficaHabitos'), {
            type: 'bar',
            data: {
                labels: labelsHabitos,
                datasets: [{
                    label: 'Hábitos completados',
                    data: datosHabitos,
                    backgroundColor: '#3b82f6',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // grafica de actividad
        new Chart(document.getElementById('graficaActividad'), {
            type: 'line',
            data: {
                labels: labelsActividad,
                datasets: [{
                    label: 'Minutos',
                    data: datosActividad,
                    borderColor: '#10b981',
                    backgroundColor: '#10b98133',
                    tension: 0.35,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafico de lecturas
        new Chart(document.getElementById('graficaLecturas'), {
            type: 'doughnut',
            data: {
                labels: ['Pendientes', 'Leyendo', 'Leídas'],
                datasets: [{
                    data: datosLecturas,
                    backgroundColor: [
                        '#f59e0b',
                        '#3b82f6',
                        '#10b981'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

    </script>


</x-app-layout>
