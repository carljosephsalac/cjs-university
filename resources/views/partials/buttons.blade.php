<div class="absolute left-0 flex gap-3 -top-12">
    <x-button-primary class="inline-flex items-center gap-1 text-xs w-fit " data-modal-target="add-modal"
        data-modal-toggle="add-modal" type="button" id="add-btn">
        <x-icon-add />
        Add Student
    </x-button-primary>
    <x-search-input />
</div>

<div class="absolute right-0 flex gap-3 -top-12">
    <form action="{{ route('students.export') }}" method="get">
        <x-button-success class="inline-flex items-center gap-1 text-xs w-fit" type="submit">
            <x-icon-download />
            Download
        </x-button-success>
    </form>
    <x-button-success class="inline-flex items-center gap-1 text-xs w-fit" type="button"
        data-modal-target="upload-modal" data-modal-toggle="upload-modal">
        <x-icon-upload />
        Upload
    </x-button-success>
</div>
