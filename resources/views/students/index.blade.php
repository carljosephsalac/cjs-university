@extends('layouts.app')

@section('content')
    <div class="flex flex-col h-screen">
        <x-navbar />
        <main
            class="flex flex-col items-center justify-center flex-grow px-3 py-3 bg-gray-100 pt-36 sm:py-0 dark:bg-gray-900">
            <div class="w-full md:w-[768px] max-h-[600px] h-fit rounded-lg shadow-md relative flex justify-center">
                @session('added')
                    <x-alert-success class="absolute sm:-top-20 -top-32">{{ $value }}</x-alert-success>
                @endsession

                @error('name')
                    <x-alert-error class="absolute sm:-top-20 -top-32">{{ $message }}</x-alert-error>
                @enderror

                <x-button-primary class="absolute left-0 inline-flex items-center gap-1 text-xs w-fit -top-12"
                    data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
                    id="add-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Student
                </x-button-primary>

                <form action="{{ route('students.export') }}" method="get">
                    <x-button-success class="absolute right-0 inline-flex items-center gap-1 text-xs w-fit -top-12"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm5.845 17.03a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V12a.75.75 0 0 0-1.5 0v4.19l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3Z"
                                clip-rule="evenodd" />
                            <path
                                d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                        </svg>
                        Download
                    </x-button-success>
                </form>

                <div class="flex flex-col overflow-x-auto overflow-y-auto rounded-lg shadow-md size-full">
                    <table class="text-sm text-left text-gray-500 size-full rtl:text-right dark:text-gray-400">
                        <thead class="sticky top-0 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Student Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Score
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $student->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $student->grade }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-full mx-auto mt-3 sm:w-fit">{{ $students->links() }}</div>
        </main>
    </div>
    <x-modal header="Add a Student">
        <form action="{{ route('students.store') }}" method="POST" class="flex flex-col gap-6">
            @csrf
            <x-input type="text" name="name" id="name" placeholder="Charles James">
                Student Name
            </x-input>
            <x-button-success class="w-full" type="submit">Save</x-button-success>
        </form>
    </x-modal>
@endsection
