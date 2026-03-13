<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                    Seguimiento personal
                </p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                    Editar actividad física
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Modifica la información de la actividad registrada.
                </p>
            </div>

            <a href="{{ route('actividades.index') }}"
               class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100">
                Volver a actividades
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('actividades.update', $actividad->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="tipo" :value="'Tipo de actividad'" />
                        <select
                            id="tipo"
                            name="tipo"
                            class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                            <option value="correr" {{ old('tipo', $actividad->tipo) == 'correr' ? 'selected' : '' }}>Correr</option>
                            <option value="andar" {{ old('tipo', $actividad->tipo) == 'andar' ? 'selected' : '' }}>Andar</option>
                            <option value="bicicleta" {{ old('tipo', $actividad->tipo) == 'bicicleta' ? 'selected' : '' }}>Bicicleta</option>
                            <option value="gym" {{ old('tipo', $actividad->tipo) == 'gym' ? 'selected' : '' }}>Gym</option>
                            <option value="natacion" {{ old('tipo', $actividad->tipo) == 'natacion' ? 'selected' : '' }}>Natación</option>
                        </select>
                        <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="duracion" :value="'Duración (minutos)'" />
                        <x-text-input
                            id="duracion"
                            name="duracion"
                            type="number"
                            class="mt-2 block w-full"
                            :value="old('duracion', $actividad->duracion)"
                            required />
                        <x-input-error :messages="$errors->get('duracion')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="fecha" :value="'Fecha'" />
                        <x-text-input
                            id="fecha"
                            name="fecha"
                            type="date"
                            class="mt-2 block w-full"
                            :value="old('fecha', $actividad->fecha)"
                            required />
                        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                    </div>

                    <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:justify-end">
                        <a href="{{ route('actividades.index') }}"
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
