<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Izquierda -->
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <span class="text-lg font-bold tracking-tight text-slate-900">
                        Personal Progress Tracker
                    </span>
                </a>

                <div class="hidden items-center gap-1 md:flex">
                    <a href="{{ route('dashboard') }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('habitos.index') }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('habitos.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Hábitos
                    </a>

                    <a href="{{ route('actividades.index') }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('actividades.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Actividad física
                    </a>

                    <a href="{{ route('lecturas.index') }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('lecturas.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Lecturas
                    </a>
                </div>
            </div>

            <!-- Derecha desktop -->
            <div class="hidden md:flex md:items-center md:gap-4">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-slate-100">
                            <p class="text-sm font-semibold text-slate-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            Mi perfil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Botón móvil -->
            <div class="flex md:hidden">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white p-2 text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div x-show="open" x-transition class="border-t border-slate-200 bg-white md:hidden">
        <div class="space-y-1 px-4 py-4">
            <a href="{{ route('dashboard') }}"
               class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
                Dashboard
            </a>

            <a href="{{ route('habitos.index') }}"
               class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('habitos.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
                Hábitos
            </a>

            <a href="{{ route('actividades.index') }}"
               class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('actividades.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
                Actividad física
            </a>

            <a href="{{ route('lecturas.index') }}"
               class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('lecturas.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
                Lecturas
            </a>
        </div>

        <div class="border-t border-slate-200 px-4 py-4">
            <div class="mb-3">
                <p class="text-sm font-semibold text-slate-900">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
            </div>

            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}"
                   class="block rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                    Mi perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="block rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                        Cerrar sesión
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
