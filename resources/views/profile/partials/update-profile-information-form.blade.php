<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Información del perfil
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            Actualiza tu nombre y dirección de correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="'Nombre'" />
            <x-text-input id="name" name="name" type="text" class="mt-2 block w-full"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="'Correo electrónico'" />
            <x-text-input id="email" name="email" type="email" class="mt-2 block w-full"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-2xl border border-amber-200 bg-amber-50 p-4">
                    <p class="text-sm text-amber-800">
                        Tu dirección de correo electrónico no está verificada.

                        <button form="send-verification"
                                class="ml-1 font-semibold underline underline-offset-4 hover:text-amber-900">
                            Haz clic aquí para reenviar el correo de verificación.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-emerald-700">
                            Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Guardar cambios</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-emerald-600"
                >
                    Guardado correctamente.
                </p>
            @endif
        </div>
    </form>
</section>
