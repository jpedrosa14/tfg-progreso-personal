<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">
                Cuenta
            </p>
            <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">
                Mi perfil
            </h1>
            <p class="mt-2 text-sm text-slate-600">
                Gestiona tu información personal, cambia tu contraseña o elimina tu cuenta.
            </p>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-5xl space-y-8 px-4 sm:px-6 lg:px-8">

            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                @include('profile.partials.update-profile-information-form')
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                @include('profile.partials.update-password-form')
            </section>

            <section class="rounded-3xl border border-red-200 bg-white p-6 shadow-sm sm:p-8">
                @include('profile.partials.delete-user-form')
            </section>

        </div>
    </div>
</x-app-layout>
