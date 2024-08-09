@session('success')
    <x-alert-success class="absolute sm:-top-20 -top-32">{{ $value }}</x-alert-success>
@endsession

@error('name')
    <x-alert-error class="absolute sm:-top-20 -top-32">{{ $message }}</x-alert-error>
@enderror

@error('excel')
    <x-alert-error class="absolute sm:-top-20 -top-32">{{ $message }}</x-alert-error>
@enderror
