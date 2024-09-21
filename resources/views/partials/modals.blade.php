<x-modal header="Add a student record" modalId="add-modal">
    <form action="{{ route('students.store') }}" method="POST" class="flex flex-col gap-6">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-7">
            <x-input type="text" name="last_name" id="last_name" placeholder="Salac" required>
                Last name
            </x-input>
            <x-input type="text" name="first_name" id="first_name" placeholder="Charles James" required>
                First name
            </x-input>
            <x-input type="text" name="middle_initial" id="middle_initial" placeholder="T" required>
                Middle Initial
            </x-input>
            <x-input type="email" name="email" id="email" placeholder="charles@gmail.com" required>
                Email
            </x-input>
            <x-select-input name="course" id="course" required>
                <x-slot:label>Course</x-slot:label>
                <option value="" {{ old('course') ? '' : 'selected' }}>Choose course</option>
                <option value="BSIT" {{ old('course') === 'BSIT' ? 'selected' : '' }}>BSIT</option>
                <option value="BSCS" {{ old('course') === 'BSCS' ? 'selected' : '' }}>BSCS</option>
                <option value="BSIS" {{ old('course') === 'BSIS' ? 'selected' : '' }}>BSIS</option>
                <option value="CompE" {{ old('course') === 'CompE' ? 'selected' : '' }}>CompE</option>
            </x-select-input>
            <x-select-input name="year" id="year" required>
                <x-slot:label>Year</x-slot:label>
                <option value="" {{ old('year') ? '' : 'selected' }}>Choose year</option>
                <option value="1" {{ old('year') === '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('year') === '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('year') === '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('year') === '4' ? 'selected' : '' }}>4</option>
            </x-select-input>
            <x-input type="number" name="prelim" id="prelim" placeholder="Whole number or decimal" step="0.01">
                Prelim
            </x-input>
            <x-input type="number" name="midterm" id="midterm" placeholder="Whole number or decimal" step="0.01">
                Midterm
            </x-input>
            <div class="sm:col-span-2">
                <x-input type="number" name="finals" id="finals" placeholder="Whole number or decimal"
                    step="0.01">
                    Finals
                </x-input>
            </div>
        </div>
        <x-button-success type="submit" class="mt-3">Save</x-button-success>
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
