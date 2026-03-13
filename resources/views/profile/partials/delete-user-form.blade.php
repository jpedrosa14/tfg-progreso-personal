<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold tracking-tight text-red-600">
            Eliminar cuenta
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            Una vez eliminada tu cuenta, todos tus datos y registros se borrarán de forma permanente.
            Esta acción no se puede deshacer.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center rounded-xl border border-red-300 bg-red-50 px-5 py-3 text-sm font-semibold text-red-700 transition hover:bg-red-100"
    >
        Eliminar cuenta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                ¿Seguro que quieres eliminar tu cuenta?
            </h2>

            <p class="mt-3 text-sm leading-6 text-slate-600">
                Esta acción eliminará permanentemente tu cuenta y todos los datos asociados.
                Introduce tu contraseña para confirmar.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Contraseña" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full"
                    placeholder="Introduce tu contraseña"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                <button type="button"
                        x-on:click="$dispatch('close')"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                    Cancelar
                </button>

                <button type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-700">
                    Sí, eliminar cuenta
                </button>
            </div>
        </form>
    </x-modal>
</section>
