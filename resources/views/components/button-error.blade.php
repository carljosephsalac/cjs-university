<button
    {{ $attributes->merge(['type', 'class' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-3 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800']) }}>
    {{ $slot }}
</button>
