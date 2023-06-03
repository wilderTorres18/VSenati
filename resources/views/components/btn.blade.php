<button {{ $attributes->merge(['style' => 'background-color: rgb(224,42,35)', 'class' => 'inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white ']) }}>
    {{ $slot }}
</button>
