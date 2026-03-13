<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
            Recuperación
        </p>
        <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            ¿Has olvidado tu contraseña?
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            No pasa nada. Indica tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
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
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button>
                Enviar enlace de recuperación
            </x-primary-button>
        </div>

        <p class="text-sm text-slate-600">
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-700">
                Volver a iniciar sesión
            </a>
        </p>
    </form>
</x-guest-layout>
