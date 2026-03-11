<x-app-layout>
    <x-slot name="header">
        <h2>Crear hábito</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('habitos.store') }}">
            @csrf

            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>

            <div>
                <label>Descripción</label>
                <textarea name="descripcion"></textarea>
            </div>

            <div>
                <label>Frecuencia</label>
                <input type="text" name="frecuencia">
            </div>

            <button type="submit">Guardar hábito</button>
        </form>
    </div>
</x-app-layout>