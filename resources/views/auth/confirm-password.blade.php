<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
            Seguridad
        </p>
        <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            Confirmar contraseña
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            Esta es una zona segura de la aplicación. Para continuar, confirma tu contraseña.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" :value="'Contraseña'" />
            <x-text-input
                id="password"
                class="mt-2 block w-full"
                type="password"
                name="password"
                required
                autofocus
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button>
                Confirmar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
