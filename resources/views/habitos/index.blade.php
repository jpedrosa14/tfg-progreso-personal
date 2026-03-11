<x-app-layout>
    <x-slot name="header">
        <h2>Mis hábitos</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('habitos.create') }}">Nuevo hábito</a>

        <ul>
            @foreach($habitos as $habito)
                <li>
                    {{ $habito->nombre }} - {{ $habito->frecuencia }}
                </li>
            @endforeach
        </ul>

    </div>
</x-app-layout>