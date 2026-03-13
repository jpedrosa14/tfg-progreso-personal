<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
            Registro
        </p>
        <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            Crear cuenta
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Empieza a gestionar tus hábitos, actividad física y lecturas en un solo lugar.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="'Nombre'" />
            <x-text-input
                id="name"
                class="mt-2 block w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="'Correo electrónico'" />
            <x-text-input
                id="email"
                class="mt-2 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="'Contraseña'" />
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
            <x-input-label for="password_confirmation" :value="'Confirmar contraseña'" />
            <x-text-input
                id="password_confirmation"
                class="mt-2 block w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 pt-2 sm:flex-row sm:items-center sm:justify-between">
            <a class="text-sm font-medium text-slate-600 underline underline-offset-4 transition hover:text-blue-600"
               href="{{ route('login') }}">
                ¿Ya tienes cuenta?
            </a>

            <x-primary-button class="justify-center sm:justify-start">
                Registrarse
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
