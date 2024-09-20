<button
    {{ $attributes->merge(['type', 'class' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-3 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full max-w-40 mx-auto']) }}>
    {{ $slot }}
</button>
