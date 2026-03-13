<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
            Recuperación
        </p>
        <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            Restablecer contraseña
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            Introduce tu nueva contraseña para recuperar el acceso a tu cuenta.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" :value="'Correo electrónico'" />
            <x-text-input
                id="email"
                class="mt-2 block w-full"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="'Nueva contraseña'" />
            <x-text-input
                id="password"
                class="mt-2 block w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="'Confirmar nueva contraseña'" />
            <x-text-input
                id="password_confirmation"
                class="mt-2 block w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button>
                Restablecer contraseña
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
