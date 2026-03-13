<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                    Seguimiento personal
                </p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                    Editar hábito
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Modifica la información del hábito seleccionado.
                </p>
            </div>

            <a href="{{ route('habitos.index') }}"
               class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100">
                Volver a hábitos
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('habitos.update', $habito) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nombre" :value="'Nombre'" />
                        <x-text-input
                            id="nombre"
                            name="nombre"
                            type="text"
                            class="mt-2 block w-full"
                            :value="old('nombre', $habito->nombre)"
                            required
                            autofocus />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="frecuencia" :value="'Frecuencia'" />
                        <x-text-input
                            id="frecuencia"
                            name="frecuencia"
                            type="text"
                            class="mt-2 block w-full"
                            :value="old('frecuencia', $habito->frecuencia)"
                            required />
                        <x-input-error :messages="$errors->get('frecuencia')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="descripcion" :value="'Descripción'" />
                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="4"
                            class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">{{ old('descripcion', $habito->descripcion) }}</textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:justify-end">
                        <a href="{{ route('habitos.index') }}"
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
