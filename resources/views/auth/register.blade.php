@extends('layouts.app')

@section('content')
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center h-screen px-6 py-8 mx-auto lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="mr-2 rounded-full size-20" src="{{ asset('student-management-logo.png') }}" alt="logo">
            </div>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('registerUser') }}" method="POST">
                        @csrf
                        <x-select-input name="type" id="type" />
                        <x-input type="text" name="name" id="name" placeholder="Don Juan">
                            Name
                        </x-input>
                        <x-input type="email" name="email" id="email" placeholder="name@company.com">
                            Email
                        </x-input>
                        <x-input type="password" name="password" id="password" placeholder="Type here">
                            Password
                        </x-input>
                        <x-input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Type here">
                            Confirm Password
                        </x-input>
                        <x-button-primary class="w-full" type="submit">Sign up</x-button-primary>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account yet?
                            <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Sign in
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
