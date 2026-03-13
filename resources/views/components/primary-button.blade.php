<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2'
]) }}>
    {{ $slot }}
</button>
