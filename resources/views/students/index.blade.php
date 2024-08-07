@extends('layouts.app')

@section('content')
    <div class="flex flex-col h-screen">
        <x-navbar />
        <main
            class="flex flex-col items-center justify-center flex-grow px-3 py-3 bg-gray-100 pt-36 sm:py-0 dark:bg-gray-900">
            <div
                class="w-full md:w-[768px] lg:w-[1024px] max-h-[600px] h-fit rounded-lg shadow-md relative flex justify-center">
                @session('success')
                    <x-alert-success class="absolute sm:-top-20 -top-32">{{ $value }}</x-alert-success>
                @endsession

                @error('name')
                    <x-alert-error class="absolute sm:-top-20 -top-32">{{ $message }}</x-alert-error>
                @enderror

                @error('excel')
                    <x-alert-error class="absolute sm:-top-20 -top-32">{{ $message }}</x-alert-error>
                @enderror

                <x-button-primary class="absolute left-0 inline-flex items-center gap-1 text-xs w-fit -top-12"
                    data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" id="add-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Student
                </x-button-primary>

                <div class="absolute right-0 flex gap-3 -top-12">
                    <form action="{{ route('students.export') }}" method="get">
                        <x-button-success class="inline-flex items-center gap-1 text-xs w-fit" type="submit">
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
                    <x-button-success class="inline-flex items-center gap-1 text-xs w-fit" type="button"
                        data-modal-target="upload-modal" data-modal-toggle="upload-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6.905 9.97a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72V18a.75.75 0 0 0 1.5 0v-4.19l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z"
                                clip-rule="evenodd" />
                            <path
                                d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                        </svg>
                        Upload
                    </x-button-success>
                </div>

                <div class="flex flex-col overflow-x-auto overflow-y-auto rounded-lg shadow-md size-full">
                    <table class="text-xs text-left text-gray-500 sm:text-sm size-full rtl:text-right dark:text-gray-400">
                        <thead class="sticky top-0 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Student Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Score
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Delete
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
                                    <td class="px-6 py-4">
                                        <x-button-error type="submit" class="flex items-center gap-1 text-xs"
                                            data-modal-target="delete-{{ $student->id }}"
                                            data-modal-toggle="delete-{{ $student->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Delete
                                        </x-button-error>
                                    </td>
                                </tr>
                                <x-modal header="Are you sure you want to delete?" modalId="delete-{{ $student->id }}">
                                    <form action="{{ route('students.delete', $student) }}" method="POST"
                                        class="flex gap-6">
                                        @csrf
                                        @method('delete')
                                        <div class="flex gap-10">
                                            <x-button-error class="w-1/2" type="submit">Yes</x-button-error>
                                            <x-button-primary class="w-1/2" type="button"
                                                data-modal-hide="delete-{{ $student->id }}">
                                                No
                                            </x-button-primary>
                                        </div>
                                    </form>
                                </x-modal>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-full mx-auto mt-3 md:w-fit">{{ $students->links() }}</div>
        </main>
    </div>

    <x-modal header="Add a Student" modalId="add-modal">
        <form action="{{ route('students.store') }}" method="POST" class="flex flex-col gap-6">
            @csrf
            <x-input type="text" name="name" id="name" placeholder="Charles James">
                Student Name
            </x-input>
            <x-button-success class="w-full" type="submit">Save</x-button-success>
        </form>
    </x-modal>

    <x-modal header="Upload a Excel File" modalId="upload-modal">
        <form action="{{ route('students.import') }}" method="POST" class="flex flex-col gap-6"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="relative">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                    Excel
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="excel" accept=".xlsx">
                @error('excel')
                    <p class="absolute text-xs text-red-500 -bottom-4">{{ $message }}</p>
                @enderror
            </div>
            <x-button-success class="w-full" type="submit">Save</x-button-success>
        </form>
    </x-modal>

    {{-- @foreach ($students as $st)
        <x-modal header="Are you sure you want to delete this?" modalId="delete-{{ $st->id }}">
            <form action="{{ route('students.delete', $student) }}" method="POST" class="flex gap-6">
                @csrf
                @method('delete')
                <x-button-error class="w-full" type="submit">Yes</x-button-error>
                <x-button-primary class="w-full" type="button" data-modal-hide="delete-{{ $st->id }}">
                    No
                </x-button-primary>
            </form>
        </x-modal>
    @endforeach --}}
@endsection
