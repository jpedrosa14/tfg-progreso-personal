<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
            Acceso
        </p>
        <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            Iniciar sesión
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Entra en tu cuenta para continuar con tu seguimiento personal.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="'Correo electrónico'" />
            <x-text-input
                id="email"
                class="mt-2 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
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
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500"
                       name="remember">
                <span class="ms-2 text-sm text-slate-600">Recordarme</span>
            </label>
        </div>

        <div class="flex flex-col gap-4 pt-2 sm:flex-row sm:items-center sm:justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-slate-600 underline underline-offset-4 transition hover:text-blue-600"
                   href="{{ route('password.request') }}">
                    ¿Has olvidado tu contraseña?
                </a>
            @endif

            <x-primary-button class="justify-center sm:justify-start">
                Iniciar sesión
            </x-primary-button>
        </div>
    </form>

    <p class="mt-8 text-sm text-slate-600">
        ¿Todavía no tienes cuenta?
        <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-700">
            Regístrate aquí
        </a>
    </p>
</x-guest-layout>
