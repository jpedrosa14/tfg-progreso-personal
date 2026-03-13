<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
            Verificación
        </p>
        <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            Verifica tu correo electrónico
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
            Gracias por registrarte. Antes de continuar, revisa tu correo y pulsa en el enlace de verificación que te hemos enviado.
            Si no lo has recibido, puedes solicitar uno nuevo.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button>
                Reenviar correo de verificación
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Cerrar sesión
            </button>
        </form>
    </div>
</x-guest-layout>
