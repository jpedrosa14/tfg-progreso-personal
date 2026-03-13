<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Actualizar contraseña
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            Utiliza una contraseña segura para proteger tu cuenta.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="'Contraseña actual'" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                          class="mt-2 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="'Nueva contraseña'" />
            <x-text-input id="update_password_password" name="password" type="password"
                          class="mt-2 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="'Confirmar nueva contraseña'" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                          class="mt-2 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Actualizar contraseña</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-emerald-600"
                >
                    Contraseña actualizada.
                </p>
            @endif
        </div>
    </form>
</section>
