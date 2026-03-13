<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                    Seguimiento personal
                </p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                    Editar lectura
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Modifica la información del libro seleccionado.
                </p>
            </div>

            <a href="{{ route('lecturas.index') }}"
               class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100">
                Volver a lecturas
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('lecturas.update', $lectura->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="titulo" :value="'Título'" />
                        <x-text-input
                            id="titulo"
                            name="titulo"
                            type="text"
                            class="mt-2 block w-full"
                            :value="old('titulo', $lectura->titulo)"
                            required
                            autofocus />
                        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="autor" :value="'Autor'" />
                        <x-text-input
                            id="autor"
                            name="autor"
                            type="text"
                            class="mt-2 block w-full"
                            :value="old('autor', $lectura->autor)" />
                        <x-input-error :messages="$errors->get('autor')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="estado" :value="'Estado'" />
                        <select
                            id="estado"
                            name="estado"
                            class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                            <option value="pendiente" {{ old('estado', $lectura->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="leyendo" {{ old('estado', $lectura->estado) == 'leyendo' ? 'selected' : '' }}>Leyendo</option>
                            <option value="leido" {{ old('estado', $lectura->estado) == 'leido' ? 'selected' : '' }}>Leído</option>
                        </select>
                        <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <x-input-label for="fecha_inicio" :value="'Fecha de inicio'" />
                            <x-text-input
                                id="fecha_inicio"
                                name="fecha_inicio"
                                type="date"
                                class="mt-2 block w-full"
                                :value="old('fecha_inicio', $lectura->fecha_inicio)" />
                            <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="fecha_fin" :value="'Fecha de fin'" />
                            <x-text-input
                                id="fecha_fin"
                                name="fecha_fin"
                                type="date"
                                class="mt-2 block w-full"
                                :value="old('fecha_fin', $lectura->fecha_fin)" />
                            <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:justify-end">
                        <a href="{{ route('lecturas.index') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100">
                            Cancelar
                        </a>

                        <x-primary-button>
                            Guardar cambios
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
