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
