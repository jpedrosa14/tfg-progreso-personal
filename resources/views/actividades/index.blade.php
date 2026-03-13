<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                    Seguimiento personal
                </p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                    Actividad física
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Registra tus entrenamientos y consulta tu actividad acumulada.
                </p>
            </div>

            <a href="{{ route('actividades.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                Registrar actividad
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Contadores -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Total actividades</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                        {{ $totalActividades }}
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Minutos totales</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                        {{ $minutosTotales }}
                    </p>
                </div>

                <div class="rounded-2xl border border-emerald-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Esta semana</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-emerald-600">
                        {{ $actividadesEstaSemana }}
                    </p>
                    <p class="mt-1 text-sm text-slate-500">sesiones registradas</p>
                </div>

                <div class="rounded-2xl border border-blue-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Minutos esta semana</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-blue-600">
                        {{ $minutosEstaSemana }}
                    </p>
                </div>
            </section>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if($actividades->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Actividad</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Duración</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Fecha</th>
                                    <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Acciones</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @foreach($actividades as $actividad)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-slate-900">
                                                {{ ucfirst($actividad->tipo) }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-700">
                                            {{ $actividad->duracion }} min
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap justify-end gap-2">
                                                <a href="{{ route('actividades.edit', $actividad->id) }}"
                                                   class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">
                                                    Editar
                                                </a>

                                                <button
                                                    type="button"
                                                    x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirmar-eliminar-actividad-{{ $actividad->id }}')"
                                                    class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                                                    Eliminar
                                                </button>
                                            </div>

                                            <x-modal name="confirmar-eliminar-actividad-{{ $actividad->id }}" focusable>
                                                <div class="p-8">
                                                    <div class="mx-auto max-w-lg">
                                                        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-red-50">
                                                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86l-7.5 13A2 2 0 004.5 20h15a2 2 0 001.71-3.14l-7.5-13a2 2 0 00-3.42 0z"/>
                                                            </svg>
                                                        </div>

                                                        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                                                            Eliminar actividad
                                                        </h2>

                                                        <p class="mt-3 text-sm leading-6 text-slate-600">
                                                            ¿Seguro que quieres eliminar la actividad
                                                            <span class="font-semibold text-slate-900">"{{ ucfirst($actividad->tipo) }}"</span>
                                                            del día
                                                            <span class="font-semibold text-slate-900">{{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}</span>?
                                                            Esta acción no se puede deshacer.
                                                        </p>

                                                        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-end">
                                                            <button
                                                                type="button"
                                                                x-on:click="$dispatch('close')"
                                                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                                                Cancelar
                                                            </button>

                                                            <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    type="submit"
                                                                    class="inline-flex items-center justify-center rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-700">
                                                                    Sí, eliminar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-modal>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="px-6 py-16 text-center">
                        <div class="mx-auto max-w-md">
                            <h2 class="text-xl font-bold text-slate-900">
                                Todavía no has registrado actividad física
                            </h2>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Añade tu primera actividad para empezar a llevar un seguimiento de entrenamientos y tiempo acumulado.
                            </p>
                            <a href="{{ route('actividades.create') }}"
                               class="mt-6 inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                                Registrar primera actividad
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
