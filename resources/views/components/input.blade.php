@props(['id' => '', 'name' => '', 'value' => '', 'error' => ''])

@php
    if ($errors->has($name)) {
        $errorInput =
            'dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer dark:placeholder-red-500 placeholder-red-500';
    } else {
        $errorInput =
            'focus:ring-primary-600 focus:border-primary-600 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500';
    }
@endphp

<div class="relative">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $slot }}
    </label>
    <input
        {{ $attributes->merge(['type', 'placeholder', 'required', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white ' . $errorInput]) }}
        id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <p class="absolute text-red-500 sm:text-xs sm:-bottom-5 text-[11px]">{{ $message }}</p>
    @enderror
</div>
