<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                    Seguimiento personal
                </p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                    Mis lecturas
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Organiza tus libros pendientes, en curso y finalizados.
                </p>
            </div>

            <a href="{{ route('lecturas.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                Añadir lectura
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

            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Total lecturas</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                        {{ $totalLecturas }}
                    </p>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Pendientes</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-amber-600">
                        {{ $pendientes }}
                    </p>
                </div>

                <div class="rounded-2xl border border-blue-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Leyendo</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-blue-600">
                        {{ $leyendo }}
                    </p>
                </div>

                <div class="rounded-2xl border border-emerald-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Leídas</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-emerald-600">
                        {{ $leidas }}
                    </p>
                </div>
            </section>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if($lecturas->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Título</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Autor</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Estado</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Fecha inicio</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Fecha fin</th>
                                    <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Acciones</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @foreach($lecturas as $lectura)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-slate-900">
                                                {{ $lectura->titulo }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $lectura->autor ?: 'Autor no indicado' }}
                                        </td>

                                        <td class="px-6 py-4">
                                            @if($lectura->estado === 'pendiente')
                                                <span class="inline-flex rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                                                    Pendiente
                                                </span>
                                            @elseif($lectura->estado === 'leyendo')
                                                <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                                                    Leyendo
                                                </span>
                                            @else
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                    Leído
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $lectura->fecha_inicio ? \Carbon\Carbon::parse($lectura->fecha_inicio)->format('d/m/Y') : '—' }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $lectura->fecha_fin ? \Carbon\Carbon::parse($lectura->fecha_fin)->format('d/m/Y') : '—' }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap justify-end gap-2">
                                                <a href="{{ route('lecturas.edit', $lectura->id) }}"
                                                   class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">
                                                    Editar
                                                </a>

                                                <button
                                                    type="button"
                                                    x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirmar-eliminar-lectura-{{ $lectura->id }}')"
                                                    class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                                                    Eliminar
                                                </button>
                                            </div>

                                            <x-modal name="confirmar-eliminar-lectura-{{ $lectura->id }}" focusable>
                                                <div class="p-8">
                                                    <div class="mx-auto max-w-lg">
                                                        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-red-50">
                                                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86l-7.5 13A2 2 0 004.5 20h15a2 2 0 001.71-3.14l-7.5-13a2 2 0 00-3.42 0z"/>
                                                            </svg>
                                                        </div>

                                                        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                                                            Eliminar lectura
                                                        </h2>

                                                        <p class="mt-3 text-sm leading-6 text-slate-600">
                                                            ¿Seguro que quieres eliminar la lectura
                                                            <span class="font-semibold text-slate-900">"{{ $lectura->titulo }}"</span>?
                                                            Esta acción no se puede deshacer.
                                                        </p>

                                                        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-end">
                                                            <button
                                                                type="button"
                                                                x-on:click="$dispatch('close')"
                                                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                                                Cancelar
                                                            </button>

                                                            <form action="{{ route('lecturas.destroy', $lectura->id) }}" method="POST">
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
                                Todavía no has añadido ninguna lectura
                            </h2>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Añade tu primer libro para empezar a llevar el control de lecturas pendientes, en curso o finalizadas.
                            </p>
                            <a href="{{ route('lecturas.create') }}"
                               class="mt-6 inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                                Añadir primera lectura
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
