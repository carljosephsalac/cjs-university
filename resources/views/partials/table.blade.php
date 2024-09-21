<div class="flex flex-col overflow-x-auto overflow-y-auto rounded-lg shadow-md size-full">
    <table class="text-xs text-left text-gray-500 sm:text-sm size-full rtl:text-right dark:text-gray-400">
        <thead class="sticky top-0 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Student Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Course & Year
                </th>
                <th scope="col" class="px-6 py-3">
                    Prelim
                </th>
                <th scope="col" class="px-6 py-3">
                    Midterm
                </th>
                <th scope="col" class="px-6 py-3">
                    Finals
                </th>
                <th scope="col" class="px-6 py-3">
                    Average
                </th>
                @can('modify-students')
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Delete
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @if ($students->count())
                @foreach ($students as $student)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ "$student->last_name, $student->first_name $student->middle_initial." }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $student->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ "$student->course $student->year" }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->prelim }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->midterm }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->finals }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->average }}
                        </td>
                        @can('modify-students')
                            <td class="px-6 py-4">
                                <x-button-primary type="submit" class="flex items-center gap-1 text-xs"
                                    data-modal-target="edit-modal-{{ $student->id }}"
                                    data-modal-toggle="edit-modal-{{ $student->id }}">
                                    <x-icon-edit />
                                    Edit
                                </x-button-primary>
                            </td>
                        @endcan
                        @can('modify-students')
                            <td class="px-6 py-4">
                                <x-button-error type="submit" class="flex items-center gap-1 text-xs"
                                    data-modal-target="delete-{{ $student->id }}"
                                    data-modal-toggle="delete-{{ $student->id }}">
                                    <x-icon-delete />
                                    Delete
                                </x-button-error>
                            </td>
                        @endcan
                    </tr>
                    {{-- DELETE MODAL --}}
                    <x-modal header="Are you sure you want to delete?" modalId="delete-{{ $student->id }}">
                        <form action="{{ route('students.delete', $student) }}" method="POST" class="flex gap-6">
                            @csrf
                            @method('delete')
                            <div class="flex gap-10 justify-center">
                                <x-button-error class="w-full max-w-40" type="submit">Yes</x-button-error>
                                <x-button-primary class="w-full max-w-40" type="button"
                                    data-modal-hide="delete-{{ $student->id }}">
                                    No
                                </x-button-primary>
                            </div>
                        </form>
                    </x-modal>

                    {{-- EDIT MODAL --}}
                    <x-modal header="Edit a student record" modalId="edit-modal-{{ $student->id }}">
                        <form action="{{ route('students.update', $student) }}" method="POST"
                            class="flex flex-col gap-6">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-7">
                                <x-input type="text" name="last_name" id="last_name" placeholder="Salac" required
                                    value="{{ $student->last_name }}">
                                    Last name
                                </x-input>
                                <x-input type="text" name="first_name" id="first_name" placeholder="Charles James"
                                    required value="{{ $student->first_name }}">
                                    First name
                                </x-input>
                                <x-input type="text" name="middle_initial" id="middle_initial" placeholder="T"
                                    required value="{{ $student->middle_initial }}">
                                    Middle Initial
                                </x-input>
                                <x-input type="email" name="email" id="email" placeholder="charles@gmail.com"
                                    required value="{{ $student->email }}">
                                    Email
                                </x-input>
                                <x-select-input name="course" id="course" required>
                                    <x-slot:label>Course</x-slot:label>
                                    <option value="" {{ old('course') ? '' : 'selected' }}>Choose course</option>
                                    <option value="BSIT"
                                        {{ old('course', $student->course) === 'BSIT' ? 'selected' : '' }}>
                                        BSIT
                                    </option>
                                    <option value="BSCS"
                                        {{ old('course', $student->course) === 'BSCS' ? 'selected' : '' }}>
                                        BSCS
                                    </option>
                                    <option value="BSIS"
                                        {{ old('course', $student->course) === 'BSIS' ? 'selected' : '' }}>
                                        BSIS
                                    </option>
                                    <option value="CompE"
                                        {{ old('course', $student->course) === 'CompE' ? 'selected' : '' }}>
                                        CompE
                                    </option>
                                </x-select-input>
                                <x-select-input name="year" id="year" required>
                                    <x-slot:label>Year</x-slot:label>
                                    <option value="" {{ old('year') ? '' : 'selected' }}>Choose year</option>
                                    <option value="1" {{ old('year', $student->year) === '1' ? 'selected' : '' }}>
                                        1
                                    </option>
                                    <option value="2" {{ old('year', $student->year) === '2' ? 'selected' : '' }}>
                                        2
                                    </option>
                                    <option value="3" {{ old('year', $student->year) === '3' ? 'selected' : '' }}>
                                        3
                                    </option>
                                    <option value="4" {{ old('year', $student->year) === '4' ? 'selected' : '' }}>
                                        4
                                    </option>
                                </x-select-input>
                                <x-input type="number" name="prelim" id="prelim" step="0.01"
                                    pattern="^\d{1}(\.\d{2})?$" placeholder="Whole number or decimal"
                                    value="{{ $student->prelim }}">
                                    Prelim
                                </x-input>
                                <x-input type="number" name="midterm" id="midterm" step="0.01"
                                    placeholder="Whole number or decimal" value="{{ $student->midterm }}">
                                    Midterm
                                </x-input>
                                <div class="sm:col-span-2">
                                    <x-input type="number" name="finals" id="finals" step="0.01"
                                        placeholder="Whole number or decimal" value="{{ $student->finals }}">
                                        Finals
                                    </x-input>
                                </div>
                                <x-button-success type="submit"
                                    class="mx-auto sm:col-span-2">Update</x-button-success>
                            </div>

                        </form>
                    </x-modal>
                @endforeach
            @else
                {{-- if no students yet --}}
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    </th>
                    <td class="px-6 py-8"></td>
                    <td class="px-6 py-8"></td>
                    <td class="px-6 py-8"></td>
                    <td class="px-6 py-8"></td>
                    <td class="px-6 py-8"></td>
                    <td class="px-6 py-8"></td>
                    @can('modify-students')
                        <td class="px-6 py-8"></td>
                        <td class="px-6 py-8"></td>
                    @endcan
                </tr>
            @endif
        </tbody>
    </table>
</div>
