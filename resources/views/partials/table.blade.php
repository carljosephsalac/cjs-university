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
                @can('modify-students')
                    <th scope="col" class="px-6 py-3">
                        Delete
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $student->grade }}
                    </td>
                    @can('modify-students')
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
                    @endcan
                </tr>
                <x-modal header="Are you sure you want to delete?" modalId="delete-{{ $student->id }}">
                    <form action="{{ route('students.delete', $student) }}" method="POST" class="flex gap-6">
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
