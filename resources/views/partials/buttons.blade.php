@can('modify-students')
    <div>
        <x-button-primary class="absolute left-0 inline-flex items-center gap-1 text-xs w-fit -top-12"
            data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" id="add-btn">
            <x-icon-add />
            Add Student
        </x-button-primary>

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
    </div>
@endcan
